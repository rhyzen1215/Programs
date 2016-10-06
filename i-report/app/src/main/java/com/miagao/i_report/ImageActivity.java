package com.miagao.i_report;


import java.io.ByteArrayOutputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.io.InputStream;

import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.telephony.TelephonyManager;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.IntentSender;
import android.content.IntentSender.SendIntentException;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.provider.MediaStore;
import android.telephony.TelephonyManager;
import android.util.Log;

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
import com.google.android.gms.drive.DriveContents;
import com.google.android.gms.drive.MetadataChangeSet;
import com.google.android.gms.drive.Contents;
import com.google.android.gms.drive.Drive;
import com.google.android.gms.drive.DriveApi;
import com.google.android.gms.drive.DriveFolder;
import com.google.android.gms.drive.DriveId;
import com.google.android.gms.drive.MetadataChangeSet;


import android.database.Cursor;
import android.database.DatabaseUtils;
import android.database.sqlite.SQLiteOpenHelper;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.os.Environment;
import android.text.format.DateFormat;
import android.widget.Toast;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.io.BufferedWriter;
import java.io.Writer;


/**
 * Android Drive Quickstart activity. This activity takes a photo and saves it
 * in Google Drive. The user is prompted with a pre-made dialog which allows
 * them to choose the file location.
 */

public class ImageActivity extends Activity implements ConnectionCallbacks,
        OnConnectionFailedListener {

    private static final String TAG = "drive-quickstart";
    private static final int REQUEST_CODE_CAPTURE_IMAGE = 1;
    private static final int REQUEST_CODE_CREATOR = 2;
    private static final int REQUEST_CODE_RESOLUTION = 3;

    private boolean confirmcon = false;

    private GoogleApiClient mGoogleApiClient;
    private GoogleApiClient mGoogleApiClient1;
    private Bitmap mBitmapToSave;
    private String devID;

    private DriveId mCurrentFolder;

    private static Context mContext;
    /**
     * ATTENTION: This was auto-generated to implement the App Indexing API.
     * See https://g.co/AppIndexing/AndroidStudio for more information.
     */
    private GoogleApiClient client;


    /**
     * Create a new file and save it to Drive.
     */


    private void saveFileToDrive() {
        // Start by creating a new contents, and setting a callback.
        Log.i(TAG, "Creating new contents.");
        final Bitmap image = mBitmapToSave;

        Drive.DriveApi.newDriveContents(mGoogleApiClient)
                .setResultCallback(new ResultCallback<DriveContentsResult>() {

                    @Override
                    public void onResult(DriveContentsResult result) {
                        // If the operation was not successful, we cannot do anything
                        // and must
                        // fail.
                        if (!result.getStatus().isSuccess()) {
                            Log.i(TAG, "Failed to create new contents.");
                            return;
                        }
                        // Otherwise, we can write our data to the new contents.
                        Log.i(TAG, "New contents created.");
                        // Get an output stream for the contents.
                        OutputStream outputStream = result.getDriveContents().getOutputStream();
                        // Write the bitmap data from it.
                        ByteArrayOutputStream bitmapStream = new ByteArrayOutputStream();
                        image.compress(Bitmap.CompressFormat.PNG, 100, bitmapStream);

                        try {
                            outputStream.write(bitmapStream.toByteArray());
                        } catch (IOException e1) {
                            Log.i(TAG, "Unable to write file contents.");
                        }


                        String h = DateFormat.format("MMddyyyyyhhmmssa", System.currentTimeMillis()).toString();
                        devID = h;

                        MetadataChangeSet metadataChangeSet = new MetadataChangeSet.Builder()
                                .setMimeType("image/png")
                                .setTitle("IMG" + h + ".png")
                                .build();
                        // Create an intent for the file chooser, and start it.
                                //IntentSender intentSender = Drive.DriveApi
                                //.newCreateFileActivityBuilder()
                                //.setInitialMetadata(metadataChangeSet)
                                //.setInitialDriveContents(result.getDriveContents())
                                //.build(mGoogleApiClient);

                        Drive.DriveApi.getRootFolder(mGoogleApiClient)
                                .createFile(mGoogleApiClient, metadataChangeSet, result.getDriveContents())
                                .setResultCallback(fileCallback);
                        //try {
                            //confirmcon = true;
                            //startIntentSenderForResult(
                           //         intentSender, REQUEST_CODE_CREATOR, null, 0, 0, 0);
                       // } catch (SendIntentException e) {
                        //    Log.i(TAG, "Failed to launch file chooser.");
                        //}

                    }
                });


    }



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
                        String userCode = resultSend.getString(9);

                        String h1 = DateFormat.format("MMddyyyyyhhmmssa", System.currentTimeMillis()).toString();

                        OutputStream outputStream = result.getDriveContents().getOutputStream();
                        Writer writer = new OutputStreamWriter(outputStream);
                        try {
                            writer.write("FNAME:" + resultSend.getString(0));
                            writer.write("\n");
                            writer.write("LNAME:" + resultSend.getString(1));
                            writer.write("\n");
                            writer.write("MBILE:" + resultSend.getString(4));
                            writer.write("\n");
                            writer.write("UFILE:" + "IMG" + devID + ".png");
                            writer.write("\n");
                            writer.write("UDATE:" + DateFormat.format("MM/dd/yyyyy", System.currentTimeMillis()).toString());
                            writer.write("\n");
                            writer.write("UTIME:" + DateFormat.format("hh:mm:ssa", System.currentTimeMillis()).toString());
                            writer.write("\n");
                            writer.write("UCODE:" + resultSend.getString(9));
                            writer.close();
                        } catch (IOException e) {
                            Log.e(TAG, e.getMessage());
                        }

                        resultSend.close();
                        databaseSend.close();


                        MetadataChangeSet changeSet = new MetadataChangeSet.Builder()
                                .setTitle("TXT" + devID + ".txt")
                                .setMimeType("text/plain")
                                .setStarred(true).build();
                        Drive.DriveApi.getRootFolder(mGoogleApiClient)
                                .createFile(mGoogleApiClient, changeSet, result.getDriveContents())
                                .setResultCallback(fileCallback);

                    }
                });

        confirmcon = false;

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
        switch (requestCode) {
            case REQUEST_CODE_CAPTURE_IMAGE:
                // Called after a photo has been taken.
                if (resultCode == Activity.RESULT_OK) {
                    // Store the image data as a bitmap for writing later.
                    mBitmapToSave = (Bitmap) data.getExtras().get("data");
                }
                break;
            case REQUEST_CODE_CREATOR:
                // Called after a file is saved to Drive.
                if (resultCode == RESULT_OK) {
                    Log.i(TAG, "Image successfully saved.");

                    mBitmapToSave = null;
                    // Just start the camera again for another photo.
                    //startActivityForResult(new Intent(MediaStore.ACTION_IMAGE_CAPTURE),
                            //REQUEST_CODE_CAPTURE_IMAGE);
                }
                break;
        }
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

        if (mBitmapToSave  != null) {

            saveFileToDrive();
            saveFileToDrive2();

            mBitmapToSave=null;

        }

        new AlertDialog.Builder(ImageActivity.this)
                .setTitle("Confirmed")
                .setMessage("Photo sent successfully. Would you like to take another picture?")
                .setPositiveButton(android.R.string.yes, new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        startActivityForResult(new Intent(MediaStore.ACTION_IMAGE_CAPTURE),
                                REQUEST_CODE_CAPTURE_IMAGE);
                        confirmcon = true;
                    }
                })
                .setNegativeButton(android.R.string.no, new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        finish();
                    }
                })
                .setIcon(android.R.drawable.ic_dialog_alert)
                .show();
    }

    @Override
    public void onConnectionSuspended(int cause) {
        Log.i(TAG, "GoogleApiClient connection suspended");
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();

        confirmcon  = false;

        startActivityForResult(new Intent(MediaStore.ACTION_IMAGE_CAPTURE),
                REQUEST_CODE_CAPTURE_IMAGE);
        confirmcon = true;



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
}
