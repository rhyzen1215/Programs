package com.miagao.i_report;

import android.app.AlertDialog;
import android.app.DatePickerDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.net.Uri;
import android.os.Bundle;
import android.text.format.DateFormat;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import java.io.IOException;
import java.io.OutputStream;
import android.app.Activity;
import android.content.Context;
import android.content.IntentSender.SendIntentException;
import android.graphics.Bitmap;
import android.provider.MediaStore;
import android.util.Log;
import android.widget.Toast;
import android.widget.Spinner;
import android.widget.ArrayAdapter;
import android.widget.AdapterView;
import android.support.v4.app.DialogFragment;

import com.google.android.gms.appindexing.Action;
import com.google.android.gms.appindexing.AppIndex;
import com.google.android.gms.appindexing.Thing;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.GoogleApiAvailability;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.GoogleApiClient.ConnectionCallbacks;
import com.google.android.gms.common.api.GoogleApiClient.OnConnectionFailedListener;
import com.google.android.gms.common.api.ResultCallback;
import com.google.android.gms.drive.Drive;
import com.google.android.gms.drive.DriveApi.DriveContentsResult;
import com.google.android.gms.drive.MetadataChangeSet;
import com.google.android.gms.drive.DriveFolder;
import java.io.OutputStreamWriter;
import java.io.Writer;

import android.widget.AdapterView.OnItemSelectedListener;
import android.support.v7.app.AppCompatActivity;
import java.util.Calendar;
import android.app.Activity;
import android.app.DatePickerDialog;
import android.app.Dialog;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.DatePicker;
import android.widget.TextView;
import android.widget.Toast;




public class RegisterActivity extends AppCompatActivity implements ConnectionCallbacks,
        OnConnectionFailedListener, OnItemSelectedListener {

    private static final String TAG = "drive-quickstart";
    private static final int REQUEST_CODE_RESOLUTION = 3;

    private GoogleApiClient mGoogleApiClient;
    private GoogleApiClient client;
    protected Context context;

    protected EditText firstname;
    protected EditText lastname;
    protected EditText mBDay;
    protected EditText mMobile;
    protected EditText mUserName;
    protected EditText mPassword1;
    protected EditText mPassword2;
    protected Button myButton;
    protected Spinner user_gender;


    private DatePicker datePicker;
    private Calendar calendar;
    private TextView dateView;
    private int year, month, day;
    public String userGender;

    private void saveFileToDrive2() {
        // Start by creating a new contents, and setting a callback.
        Log.i(TAG, "Creating new contents.");

        Drive.DriveApi.newDriveContents(mGoogleApiClient)
                .setResultCallback(new ResultCallback<DriveContentsResult>() {

                    @Override
                    public void onResult(DriveContentsResult result) {


                        SQLiteDatabase databaseSend = openOrCreateDatabase("ireport",MODE_PRIVATE,null);
                        Cursor resultSend = databaseSend.rawQuery("Select * from accounts", null);
                        resultSend.moveToFirst();
                        String mLogUser = resultSend.getString(9);

                        OutputStream outputStream = result.getDriveContents().getOutputStream();
                        Writer writer = new OutputStreamWriter(outputStream);
                        try {
                            writer.write("FNAME:" + resultSend.getString(0));
                            writer.write("\n");
                            writer.write("LNAME:" + resultSend.getString(1));
                            writer.write("\n");
                            writer.write("GNDER:" + resultSend.getString(2));
                            writer.write("\n");
                            writer.write("BDATE:" + resultSend.getString(3));
                            writer.write("\n");
                            writer.write("MBILE:" + resultSend.getString(4));
                            writer.write("\n");
                            writer.write("USERN:" + resultSend.getString(5));
                            writer.write("\n");
                            writer.write("DTREG:" + resultSend.getString(7));
                            writer.write("\n");
                            writer.write("TMREG:" + resultSend.getString(8));
                            writer.write("\n");
                            writer.write("UCODE:" + resultSend.getString(9));
                            writer.close();
                        } catch (IOException e) {
                            Log.e(TAG, e.getMessage());
                        }

                        resultSend.close();
                        databaseSend.close();

                        MetadataChangeSet changeSet = new MetadataChangeSet.Builder()
                                .setTitle("FILE" + mLogUser + ".txt")
                                .setMimeType("text/plain")
                                .setStarred(true).build();

                        Drive.DriveApi.getRootFolder(mGoogleApiClient)
                                .createFile(mGoogleApiClient, changeSet, result.getDriveContents())
                                .setResultCallback(fileCallback);

                    }
                });


    }

    public void onItemSelected(AdapterView<?> parent, View view, int pos, long id) {
        switch (pos) {
            case 1:
                userGender = "Male";
                //oast.makeText(getApplicationContext(), " MALE.", Toast.LENGTH_LONG).show();
                break;
            case 2:
                userGender = "Female";
                //Toast.makeText(getApplicationContext(), " FEMALE.", Toast.LENGTH_LONG).show();
                break;
        }
    }
    public void onNothingSelected(AdapterView<?> parent) {
        // Another interface callback
    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        firstname = (EditText) findViewById(R.id.editTextRegFname);
        lastname = (EditText) findViewById(R.id.editTextRegLname);
        mUserName = (EditText) findViewById(R.id.editTextRegUser);
        mPassword1 = (EditText) findViewById(R.id.editTextRegPass1);
        mPassword2 = (EditText) findViewById(R.id.editTextRegPass2);
        mBDay = (EditText) findViewById(R.id.editTextRegBday);
        myButton = (Button) findViewById(R.id.btnRegSignupButton);
        client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();
        user_gender = (Spinner) findViewById(R.id.spinnergender);

        mMobile = (EditText) findViewById(R.id.editTextRegAge);

        calendar = Calendar.getInstance();
        year = calendar.get(Calendar.YEAR);

        month = calendar.get(Calendar.MONTH);
        day = calendar.get(Calendar.DAY_OF_MONTH);
        //showDate(year, month+1, day);

        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.spinner_gender, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        user_gender.setAdapter(adapter);
        user_gender.setOnItemSelectedListener(this);

        myButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ConnectDB();
                Toast.makeText(getApplicationContext(), "Successfully Registered.", Toast.LENGTH_LONG).show();
            }
        });

    }



    private void ConnectDB() {

        String fname = firstname.getText().toString();
        String lname = lastname.getText().toString();
        String gender = userGender.toString();
        String bday = mBDay.getText().toString();
        String mobile = mMobile.getText().toString();
        String muser = mUserName.getText().toString();
        String mpass = mPassword2.getText().toString();
        String datereg = DateFormat.format("MM/dd/yyyyy", System.currentTimeMillis()).toString();
        String timereg = DateFormat.format("hh:mm:ss a", System.currentTimeMillis()).toString();
        String regcode = DateFormat.format("MMddyyyyy-hhmmss", System.currentTimeMillis()).toString();


        SQLiteDatabase mydatabase3 = openOrCreateDatabase("ireport",MODE_PRIVATE,null);
        mydatabase3.execSQL("INSERT INTO accounts VALUES('" + fname + "','" + lname + "','" + gender + "'," +
                "'" + bday + "','" + mobile + "','" + muser + "','" + mpass + "','" + datereg + "','" + timereg + "'," +
                "'" + regcode + "','0','0');");

        Cursor resultSet = mydatabase3.rawQuery("Select Firstname from accounts",null);
        resultSet.moveToFirst();
        String username = resultSet.getString(0);
        mydatabase3.close();
        saveFileToDrive2();
        firstname.setText("");
        lastname.setText("");
        mUserName.setText("");
        mPassword1.setText("");
        mPassword2.setText("");
        mBDay.setText("");
        mMobile.setText("");

    }



    final private ResultCallback<DriveFolder.DriveFileResult> fileCallback = new
            ResultCallback<DriveFolder.DriveFileResult>() {
                @Override
                public void onResult(DriveFolder.DriveFileResult result) {
                    if (!result.getStatus().isSuccess()) {
                        Log.i(TAG, "Failed to launch file chooser.");
                        return;
                    }
                    Log.i(TAG, "Ok.");
                }
            };


    @Override
    protected void onResume() {
        super.onResume();
        if (mGoogleApiClient == null) {
            // Create the API client and bind it to an instance variable.
            // We use this instance as the callback for connection and connection
            // failures.
            // Since no account name is passed, the user is prompted to choose.
            mGoogleApiClient = new GoogleApiClient.Builder(this)

                    .addApi(Drive.API)
                    .addScope(Drive.SCOPE_FILE)
                    .setAccountName("ireportmiagao@gmail.com")
                    .addConnectionCallbacks(this)
                    .addOnConnectionFailedListener(this)
                    .build();
        }
        // Connect the client. Once connected, the camera is launched.
        mGoogleApiClient.connect();
    }

    @Override
    protected void onPause() {
        if (mGoogleApiClient != null) {
            mGoogleApiClient.disconnect();
        }
        super.onPause();
    }

    @Override
    protected void onActivityResult(final int requestCode, final int resultCode, final Intent data) {

    }



    @Override
    public void onConnectionFailed(ConnectionResult result) {
        // Called whenever the API client fails to connect.
        Log.i(TAG, "GoogleApiClient connection failed: " + result.toString());
        if (!result.hasResolution()) {
            // show the localized error dialog.
            GoogleApiAvailability.getInstance().getErrorDialog(this, result.getErrorCode(), 0).show();
            return;
        }
        // The failure has a resolution. Resolve it.
        // Called typically when the app is not yet authorized, and an
        // authorization
        // dialog is displayed to the user.
        try {
            result.startResolutionForResult(this, REQUEST_CODE_RESOLUTION);
        } catch (SendIntentException e) {
            Log.e(TAG, "Exception while starting resolution activity", e);
        }
    }

    @Override
    public void onConnected(Bundle connectionHint) {
        Log.i(TAG, "API client connected.");
        //saveFileToDrive2();
    }

    @Override
    public void onConnectionSuspended(int cause) {
        Log.i(TAG, "GoogleApiClient connection suspended");
    }



    /**
     * ATTENTION: This was auto-generated to implement the App Indexing API.
     * See https://g.co/AppIndexing/AndroidStudio for more information.
     */
    public Action getIndexApiAction() {
        Thing object = new Thing.Builder()
                .setName("Image Page") // TODO: Define a title for the content shown.
                // TODO: Make sure this auto-generated URL is correct.
                .setUrl(Uri.parse("http://[ENTER-YOUR-URL-HERE]"))
                .build();
        return new Action.Builder(Action.TYPE_VIEW)
                .setObject(object)
                .setActionStatus(Action.STATUS_TYPE_COMPLETED)
                .build();
    }

    @Override
    public void onStart() {
        super.onStart();

        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        client.connect();
        AppIndex.AppIndexApi.start(client, getIndexApiAction());
    }

    @Override
    public void onStop() {
        super.onStop();

        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        AppIndex.AppIndexApi.end(client, getIndexApiAction());
        client.disconnect();
    }


    //CALENDAR VIEW

    @SuppressWarnings("deprecation")
    public void setDate(View view) {
        showDialog(999);
        //Toast.makeText(getApplicationContext(), "ca", Toast.LENGTH_SHORT)
                //.show();
    }

    @Override
    protected Dialog onCreateDialog(int id) {
        // TODO Auto-generated method stub
        if (id == 999) {
            return new DatePickerDialog(this, myDateListener, year, month, day);
        }
        return null;
    }

    private DatePickerDialog.OnDateSetListener myDateListener = new DatePickerDialog.OnDateSetListener() {
        @Override
        public void onDateSet(DatePicker arg0, int arg1, int arg2, int arg3) {
            // TODO Auto-generated method stub
            // arg1 = year
            // arg2 = month
            // arg3 = day
            showDate(arg1, arg2+1, arg3);
        }
    };

    private void showDate(int year, int month, int day) {
        mBDay.setText(new StringBuilder().append(month).append("/")
                .append(day).append("/").append(year));
        mBDay.setHint("Birthday");
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        //getMenuInflater().inflate(R.dimen.register, menu);
        return true;
    }
}

