package com.miagao.i_report;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.net.Uri;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import java.io.ByteArrayOutputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.io.InputStream;


import android.app.Activity;
import android.content.Context;
import android.content.IntentSender.SendIntentException;
import android.graphics.Bitmap;
import android.provider.MediaStore;
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
import com.google.android.gms.drive.MetadataChangeSet;
import com.google.android.gms.drive.DriveFolder;
import com.google.android.gms.drive.DriveId;
import android.text.format.DateFormat;
import java.io.OutputStreamWriter;
import java.io.Writer;
import android.location.Location;
import android.location.LocationManager;
import android.location.LocationListener;



public class CallActivity extends Activity implements ConnectionCallbacks,
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
        private GoogleApiClient client;
        private String dataString;
        private EditText txtLat;

        protected Context context;


        private void saveFileToDrive() {
            // Start by creating a new contents, and setting a callback.
            Log.i(TAG, "Creating new contents.");
            final Bitmap image = mBitmapToSave;

            Drive.DriveApi.newDriveContents(mGoogleApiClient)
                    .setResultCallback(new ResultCallback<DriveContentsResult>() {

                        @Override
                        public void onResult(DriveContentsResult result) {

                            if (!result.getStatus().isSuccess()) {
                                Log.i(TAG, "Failed to create new contents.");
                                return;
                            }

                            Log.i(TAG, "New contents created.");


                            OutputStream outputStream = result.getDriveContents().getOutputStream();
                            ByteArrayOutputStream bitmapStream = new ByteArrayOutputStream();
                            image.compress(Bitmap.CompressFormat.PNG, 100, bitmapStream);
                            try {
                                outputStream.write(bitmapStream.toByteArray());
                                outputStream.close();
                            } catch (IOException e1) {
                                Log.i(TAG, "Unable to write file contents.");
                            }

                            String h = DateFormat.format("MMddyyyyyhhmmssa", System.currentTimeMillis()).toString();


                            MetadataChangeSet metadataChangeSet = new MetadataChangeSet.Builder()
                                    .setMimeType("image/png")
                                    .setTitle( h + ".png")
                                    .build();

                            Drive.DriveApi.getRootFolder(mGoogleApiClient)
                                    .createFile(mGoogleApiClient, metadataChangeSet, result.getDriveContents())
                                    .setResultCallback(fileCallback);

                            dataString = h;
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

                            Cursor resultSend = databaseSend.rawQuery("Select * from accounts where LogStatus = '1'", null);
                            resultSend.moveToFirst();
                            String mLogUser = resultSend.getString(0);
                            resultSend.close();
                            databaseSend.close();

                            OutputStream outputStream = result.getDriveContents().getOutputStream();
                            Writer writer = new OutputStreamWriter(outputStream);
                            try {
                                writer.write(dataString);
                                writer.close();
                            } catch (IOException e) {
                                Log.e(TAG, e.getMessage());
                            }


                            MetadataChangeSet changeSet = new MetadataChangeSet.Builder()
                                    .setTitle("FILE" + dataString + ".txt")
                                    .setMimeType("text/plain")
                                    .setStarred(true).build();

                            Drive.DriveApi.getRootFolder(mGoogleApiClient)
                                    .createFile(mGoogleApiClient, changeSet, result.getDriveContents())
                                    .setResultCallback(fileCallback);




                        }
                    });


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
                        startActivityForResult(new Intent(MediaStore.ACTION_IMAGE_CAPTURE),
                                REQUEST_CODE_CAPTURE_IMAGE);

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

            if (mBitmapToSave == null) {
                // This activity has no UI of its own. Just start the camera.
                startActivityForResult(new Intent(MediaStore.ACTION_IMAGE_CAPTURE),
                        REQUEST_CODE_CAPTURE_IMAGE);
                return;
            }
            saveFileToDrive();
            saveFileToDrive2();
        }

        @Override
        public void onConnectionSuspended(int cause) {
            Log.i(TAG, "GoogleApiClient connection suspended");
        }

        @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_call);

            client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();
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

