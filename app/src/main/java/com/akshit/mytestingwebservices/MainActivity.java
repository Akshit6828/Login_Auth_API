package com.akshit.mytestingwebservices;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    EditText e1,e2,e3,e4,e5,e6,e7;
    Button b1;
    RequestQueue requestQueue;
    ProgressDialog pd;
    String gender;
    String url="https://mimitcollege.000webhostapp.com/register.php";  //URL OF WEB API

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        e1=findViewById(R.id.e1);
        e2=findViewById(R.id.e2);
        e3=findViewById(R.id.e3);
        e4=findViewById(R.id.e4);
        e5=findViewById(R.id.e5);
        e6=findViewById(R.id.e6);
        e7=findViewById(R.id.e7);
        b1=findViewById(R.id.button);
        requestQueue= Volley.newRequestQueue(this);// Points from where to send the request. So we are sending request through Volley.
     b1.setOnClickListener(new View.OnClickListener() {
         @Override
         public void onClick(View v) {
             pd= new ProgressDialog(MainActivity.this);
             pd.setMessage("Please Wait");
             pd.show();
             gender=e3.getText().toString();
             //now we want to send whole data with the following code below.
             StringRequest request=new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
                 @Override
                 public void onResponse(String response) {//this response will come by PHP Echo_Json from server
                     Toast.makeText(MainActivity.this, ""+response, Toast.LENGTH_SHORT).show();
                 }
                 }, new Response.ErrorListener() {
                 @Override
                 public void onErrorResponse(VolleyError error) {
                     pd.dismiss();
                     Toast.makeText(MainActivity.this, "" + error.getMessage(), Toast.LENGTH_SHORT).show();
                 }
             })
             {
                 //init block; //this is init block.(which executes jst before executing constructor)
                 @Override
                 protected Map<String, String> getParams() throws AuthFailureError {
                    //Logic to send data
                    Map<String,String> values= new HashMap<String, String>();
                    values.put("name",e1.getText().toString());
                    values.put("email",e2.getText().toString());
                    values.put("gender",gender);
                    values.put("phone",e4.getText().toString());
                    values.put("age",e5.getText().toString());
                    values.put("address",e6.getText().toString());
                    values.put("password",e7.getText().toString());

                     return values;
                 }
             };
             requestQueue.add(request);//This will send data to server. Very Important Line!!!

         }
     });
    }
}
