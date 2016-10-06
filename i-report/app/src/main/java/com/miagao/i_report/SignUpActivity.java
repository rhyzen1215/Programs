package com.miagao.i_report;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;


public class SignUpActivity extends AppCompatActivity {


    protected EditText mFName;
    protected EditText mLName;
    protected EditText mUserName;
    protected EditText mPassword1;
    protected EditText mPassword2;
    protected Button myButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        mFName = (EditText) findViewById(R.id.editTextFname);
        mLName = (EditText) findViewById(R.id.editTextLname);
        mUserName = (EditText) findViewById(R.id.editTextUser);
        mPassword1 = (EditText) findViewById(R.id.editTextPass1);
        mPassword2 = (EditText) findViewById(R.id.editTextPass2);
        myButton = (Button) findViewById(R.id.btnSignupButton);

        myButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                InitialCheck();
            }
        });


    }



    private void InitialCheck() {

        String pass1 = mPassword1.getText().toString();
        String pass2 = mPassword2.getText().toString();

        try {
            if (pass1.equals(pass2)) {
                ConnectDB();
            } else {
                new AlertDialog.Builder(SignUpActivity.this)
                        .setTitle("Error")
                        .setMessage("Passwords do not match " + pass1 + " = " + pass2)
                        .setIcon(android.R.drawable.ic_dialog_alert)
                        .show();
            }
        }
        catch (Exception e) {
            //
        }

    }

    private void ConnectDB() {

        String mfname = mFName.getText().toString();
        String mlname = mLName.getText().toString();
        String muser = mUserName.getText().toString();
        String mpass = mPassword2.getText().toString();

        SQLiteDatabase mydatabase3 = openOrCreateDatabase("ireport",MODE_PRIVATE,null);
        mydatabase3.execSQL("INSERT INTO accounts VALUES('" + mfname + "','" + mlname + "','" + muser + "','" + mpass + "','0','0');");

        Cursor resultSet = mydatabase3.rawQuery("Select Firstname from accounts",null);
        resultSet.moveToFirst();
        String username = resultSet.getString(0);
        mydatabase3.close();

        //saveFileToDrive2();

        new AlertDialog.Builder(SignUpActivity.this)
                .setTitle("Registration Successful")
                .setMessage("Welcome " + username + ". Please tap OK to proceed to Sign In. Thank you.")
                .setPositiveButton(android.R.string.ok, new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        finish();
                    }
                })

                .setIcon(android.R.drawable.ic_dialog_alert)
                .show();

    }

}

