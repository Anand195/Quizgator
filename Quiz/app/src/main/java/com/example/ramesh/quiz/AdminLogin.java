package com.example.ramesh.quiz;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

public class AdminLogin extends AppCompatActivity {

    EditText mAdminEmailId,mAdminPassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.adminlogin);

        mAdminEmailId=(EditText)findViewById(R.id.edittext1);
        mAdminPassword=(EditText)findViewById(R.id.edittext2);

    }

    public void aAdminLogin(View view){
        String aEmailid=mAdminEmailId.getText().toString();
        String aPassword=mAdminPassword.getText().toString();

        Admin admin=new Admin(aEmailid,aPassword);

        Intent intent=new Intent(AdminLogin.this,AdminProfile.class);
        startActivity(intent);
    }

    private class Admin{
        private String emailId,password;

        Admin(){}
        Admin(String emailId,String password){
            this.emailId=emailId;
            this.password=password;
        }
    }
}
