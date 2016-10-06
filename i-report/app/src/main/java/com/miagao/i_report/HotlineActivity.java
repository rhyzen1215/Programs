package com.miagao.i_report;

import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class HotlineActivity extends AppCompatActivity {

    private Button b911Call;
    private Button b8888Call;
    private Button bPoliceCall;
    private Button bFireCall;
    private Button bHomeCall;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hotline);


        bHomeCall = (Button) findViewById(R.id.btnHotlineHome);
        b911Call = (Button) findViewById(R.id.btnH911);
        b8888Call = (Button) findViewById(R.id.btnH888);
        bPoliceCall = (Button) findViewById(R.id.btnHPolice);
        bFireCall = (Button) findViewById(R.id.btnHFire);


        bHomeCall.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {
                finish();

            }
        });

        b911Call.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {
                Intent in=new Intent(Intent.ACTION_DIAL, Uri.parse("tel:911"));
                try{
                    startActivity(in);
                }

                catch (android.content.ActivityNotFoundException ex){
                    Toast.makeText(getApplicationContext(),"Call Failed.",Toast.LENGTH_SHORT).show();
                }

            }
        });

        b8888Call.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {
                Intent in=new Intent(Intent.ACTION_DIAL, Uri.parse("tel:8888"));
                try{
                    startActivity(in);
                }

                catch (android.content.ActivityNotFoundException ex){
                    Toast.makeText(getApplicationContext(),"Call Failed.",Toast.LENGTH_SHORT).show();
                }

            }
        });


        bPoliceCall.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {
                Intent in=new Intent(Intent.ACTION_DIAL, Uri.parse("tel:+639091589333"));
                try{
                    startActivity(in);
                }

                catch (android.content.ActivityNotFoundException ex){
                    Toast.makeText(getApplicationContext(),"Call Failed.",Toast.LENGTH_SHORT).show();
                }

            }
        });

        bFireCall.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {
                Intent in=new Intent(Intent.ACTION_DIAL, Uri.parse("tel:1111"));
                try{
                    startActivity(in);
                }

                catch (android.content.ActivityNotFoundException ex){
                    Toast.makeText(getApplicationContext(),"Call Failed.",Toast.LENGTH_SHORT).show();
                }

            }
        });

    }
}
