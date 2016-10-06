package com.miagao.i_report;


import java.io.FileInputStream;
import java.io.OutputStream;
import java.io.BufferedInputStream;

import android.support.v7.app.AppCompatActivity;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.content.Intent;
import android.content.IntentSender.SendIntentException;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.provider.MediaStore;
import android.text.format.DateFormat;
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

import android.net.Uri;
import android.Manifest;
import android.os.Build;



import java.io.File;

import android.content.pm.PackageManager;
import android.os.Environment;

import android.widget.Toast;


/**
 * Android Drive Quickstart activity. This activity takes a photo and saves it
 * in Google Drive. The user is prompted with a pre-made dialog which allows
 * them to choose the file location.
 */
public class VideoActivity extends AppCompatActivity implements ConnectionCallbacks,
        OnConnectionFailedListener {

    private static final String TAG = "drive-quickstart";
    private static final int REQUEST_CODE_CAPTURE_IMAGE = 1;
    private static final int REQUEST_CODE_CREATOR = 2;
    private static final int REQUEST_CODE_RESOLUTION = 3;


    static final int REQUEST_VIDEO_CAPTURE = 1;

    private boolean confirmcon = false;

    private GoogleApiClient mGoogleApiClient;
    private Bitmap mBitmapToSave;
    private String devID;

    private DriveId mCurrentFolder;


    // Camera activity request codes
    private static final int CAMERA_CAPTURE_VIDEO_REQUEST_CODE = 200;

    public static final int MEDIA_TYPE_IMAGE = 1;
    public static final int MEDIA_TYPE_VIDEO = 2;

    public static final int PERMISSION_REQUEST_CODE = 100;

    /**
     * ATTENTION: This was auto-generated to implement the App Indexing API.
     * See https://g.co/AppIndexing/AndroidStudio for more information.
     */
    private GoogleApiClient client;


    /**
     * Create a new file and save it to Drive.
     */
    private static final int VIDEO_CAPTURE = 101;
    private Uri fileUri;
    private Uri videoresult;

    private String videoresultpath;
    private byte[] videoFileArray;

    String videoFilename = "NEW" + DateFormat.format("hhmmssa", System.currentTimeMillis()).toString();
    private File videoFile = new File(Environment.getExternalStorageDirectory(), videoFilename + ".mp4");

    //private File videoFile = new File(getApplicationContext().getFilesDir(), videoFilename + ".mp4");
    //private File videoFile = new File(System.getenv("SECONDARY_STORAGE"), videoFilename + ".mp4");


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();

        Intent intent = new Intent(MediaStore.ACTION_VIDEO_CAPTURE);
        fileUri = Uri.fromFile(videoFile);
        intent.putExtra(MediaStore.EXTRA_OUTPUT, fileUri);
        intent.putExtra(MediaStore.EXTRA_VIDEO_QUALITY, 0);
        startActivityForResult(intent, VIDEO_CAPTURE);


        String secStore = System.getenv("SECONDARY_STORAGE");
        File f_secs = new File(secStore);

        //String state = Environment.getExternalStorageState();
        Toast.makeText(VideoActivity.this, "Storage: " + secStore,
                Toast.LENGTH_LONG).show();


        if (Build.VERSION.SDK_INT >= 23)
        {

                requestPermission();
        }

    }



    private void saveFileToDrive() {
        // Start by creating a new contents, and setting a callback.
        Log.i(TAG, "Creating new contents.");

        Drive.DriveApi.newDriveContents(mGoogleApiClient)
                .setResultCallback(new ResultCallback<DriveContentsResult>() {

                    @Override
                    public void onResult(DriveContentsResult result) {

                        if (!result.getStatus().isSuccess()) {
                            Log.i(TAG, "Failed to create new contents.");
                            return;
                        }


                        // Otherwise, we can write our data to the new contents.
                        Log.i(TAG, "New contents created.");
                        // Get an output stream for the contents.
                        OutputStream outputStream = result.getDriveContents().getOutputStream();

                        Uri data = videoresult;

                        BufferedInputStream bis = null;

                        try {

                            bis = new BufferedInputStream(new FileInputStream(videoFile.getPath()));
                            //bos = new BufferedOutputStream(new FileOutputStream(destinationFilename, false));
                            //byte[] buf = new byte[1024];
                            //bis.read(buf);
                            //do {
                              //  outputStream.write(buf);
                            //} while(bis.read(buf) != -1);

                            Toast.makeText(VideoActivity.this, "Video Uploaded.",
                                    Toast.LENGTH_LONG).show();

                            //outputStream.write(videoFileArray);


                        } catch (Exception e) {
                            e.printStackTrace();
                            Log.i(TAG, "Unable to write file contents.");
                            Toast.makeText(VideoActivity.this, "Video Failed." + videoresultpath +
                                    "\n" + e.toString(),
                                    Toast.LENGTH_LONG).show();
                        }


                        MetadataChangeSet metadataChangeSet = new MetadataChangeSet.Builder()
                                .setMimeType("video/*")
                                .setTitle(videoFilename + "vid.mp4")
                                .build();


                        Drive.DriveApi.getRootFolder(mGoogleApiClient)
                                .createFile(mGoogleApiClient, metadataChangeSet, result.getDriveContents())
                                .setResultCallback(fileCallback);

                        //Toast.makeText(VideoActivity.this, "Video Successful.",
                           //Toast.LENGTH_LONG).show();


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
            mGoogleApiClient = new GoogleApiClient.Builder(this)
                    .addApi(Drive.API)
                    .addScope(Drive.SCOPE_FILE)
                    .setAccountName("ireportmiagao@gmail.com")
                    .addConnectionCallbacks(this)
                    .addOnConnectionFailedListener(this)
                    .build();
        }
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
        if (requestCode == VIDEO_CAPTURE) {

            if (resultCode == RESULT_OK) {

                if (data.getData() != null) {
                    Toast.makeText(VideoActivity.this, "Intent OK." + data.getData().getPath(),
                            Toast.LENGTH_LONG).show();
                    Uri gteUri = data.getData();
                    videoresult = data.getData();


                    try {

                        BufferedInputStream bis = new BufferedInputStream(new FileInputStream(videoFile.getPath()));
                        Toast.makeText(VideoActivity.this, "Video Uploaded.",
                                Toast.LENGTH_LONG).show();


                    } catch (Exception e) {
                        e.printStackTrace();
                        Log.i(TAG, "Unable to write file contents.");
                        Toast.makeText(VideoActivity.this, "Video Failed." + videoresult +
                                        "\n" + e.toString(),
                                Toast.LENGTH_LONG).show();
                    }


                    //saveFileToDrive();
                }

            } else if (resultCode == RESULT_CANCELED) {
                Toast.makeText(this, "Video recording cancelled.",
                        Toast.LENGTH_LONG).show();
            } else {
                Toast.makeText(this, "Failed to record video",
                        Toast.LENGTH_LONG).show();
            }
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


        //File mediaFile = new File(Environment.getExternalStorageDirectory().getAbsolutePath() + "/myvideo.mp4");


        //saveFileToDrive();
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
                .setName("Video Page") // TODO: Define a title for the content shown.
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














    private boolean checkPermission() {
        int result = ContextCompat.checkSelfPermission(VideoActivity.this, Manifest.permission.WRITE_EXTERNAL_STORAGE);
        if (result == PackageManager.PERMISSION_GRANTED) {
            return true;
        } else {
            return false;
        }
    }

    private void requestPermission() {

        if (ActivityCompat.shouldShowRequestPermissionRationale(VideoActivity.this, Manifest.permission.WRITE_EXTERNAL_STORAGE)) {
            Toast.makeText(VideoActivity.this, "Write External Storage permission allows us to do store images. Please allow this permission in App Settings.", Toast.LENGTH_LONG).show();
        } else {
            ActivityCompat.requestPermissions(VideoActivity.this, new String[]{Manifest.permission.WRITE_EXTERNAL_STORAGE}, PERMISSION_REQUEST_CODE);
        }
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        switch (requestCode) {
            case PERMISSION_REQUEST_CODE:
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    Log.e("value", "Permission Granted, Now you can use local drive .");
                    Toast.makeText(this, "Permission Granted",
                            Toast.LENGTH_LONG).show();
                } else {
                    Log.e("value", "Permission Denied, You cannot use local drive .");
                    Toast.makeText(this, "Permission Denied",
                            Toast.LENGTH_LONG).show();
                }
                break;
        }
    }



}
