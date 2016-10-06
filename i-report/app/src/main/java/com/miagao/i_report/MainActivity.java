package com.miagao.i_report;

import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.EditText;
import android.widget.TextView;

import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

public class MainActivity extends AppCompatActivity {

    private EditText mEditText;
    private Button mBtnSingIn;
    private Button mBtnSignUp;
    private TextView txtView;
    private EditText txtPassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mBtnSignUp = (Button)  findViewById(R.id.btnSignUp);
        mBtnSingIn = (Button)  findViewById(R.id.button4);
        mEditText = (EditText) findViewById(R.id.editTextUsername);
        txtPassword = (EditText) findViewById(R.id.editTextPass);
        txtView = (TextView) findViewById(R.id.textView);

        mBtnSingIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SampleView();
            }
        });
        mBtnSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                LoginReg();
            }
        });


        SQLiteDatabase mydatabase = openOrCreateDatabase("ireport",MODE_PRIVATE,null);
        mydatabase.execSQL("CREATE TABLE IF NOT EXISTS accounts(Firstname VARCHAR, Lastname VARCHAR," +
                "Gender VARCHAR, Birthday VARCHAR, Mobile VARCHAR," +
                "Username VARCHAR, Password VARCHAR, DateReg VARCHAR, TimeReg VARCHAR," +
                "UserCode VARCHAR, Status VARCHAR, LogStatus VARCHAR);");

        Cursor resultSet2 = mydatabase.rawQuery("Select * from accounts where LogStatus = '1'", null);

        try {
            if (resultSet2 != null && resultSet2.getCount() > 0) {
                mydatabase.close();
                startActivity(new Intent(MainActivity.this, HomeActivity.class));
            }
            else {
                mydatabase.close();
            }

        }
        catch (Exception e){
            //throw new Exception(e.toString());
            new AlertDialog.Builder(MainActivity.this)
                    .setTitle("Error")
                    .setMessage("Error Login.")
                    .setIcon(android.R.drawable.ic_dialog_alert)
                    .show();
            resultSet2.close();
            mydatabase.close();

        }



    }



    private void SampleView() {

        String curUser = mEditText.getText().toString();
        String curPass = txtPassword.getText().toString();


        SQLiteDatabase mydatabase = openOrCreateDatabase("ireport", MODE_PRIVATE, null);
        Cursor resultSet1 = mydatabase.rawQuery("Select Count(*) from accounts where Username = '" + curUser + "'", null);

        try {
            if (resultSet1 != null && resultSet1.getCount() > 0) {
                Cursor resultSet = mydatabase.rawQuery("Select Firstname, Password, LogStatus from accounts where Username = '" + curUser + "'", null);
                resultSet.moveToFirst();
                String mfirstname = resultSet.getString(0);
                String mPassword = resultSet.getString(1);
                resultSet.close();
                if (curPass.equals(mPassword)) {
                    ContentValues cv = new ContentValues();
                    cv.put("LogStatus", "1");
                    mydatabase.update("accounts", cv, "Username= '" + curUser + "'", null);

                    startActivity(new Intent(MainActivity.this, HomeActivity.class));
                    txtView.setText("");
                    mEditText.setText("");
                    txtPassword.setText("");
                }
                else {
                    new AlertDialog.Builder(MainActivity.this)
                            .setTitle("Error")
                            .setMessage("wrong password.")
                            .setIcon(android.R.drawable.ic_dialog_alert)
                            .show();
                }
                mydatabase.close();
            }
        }
        catch (Exception e){
            //throw new Exception(e.toString());
            new AlertDialog.Builder(MainActivity.this)
                    .setTitle("Error")
                    .setMessage("User does not exist or wrong password.")
                    .setIcon(android.R.drawable.ic_dialog_alert)
                    .show();
            resultSet1.close();
            mydatabase.close();

        }

    }


    private void LoginReg() {

        startActivity(new Intent(MainActivity.this, RegisterActivity.class));

    }
}
