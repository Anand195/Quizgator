package com.example.ramesh.quiz;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class UserLogin extends AppCompatActivity {

    EditText mUserEmailId,mUserPassword;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.userlogin);

        mUserEmailId=(EditText)findViewById(R.id.edittextu1);
        mUserPassword=(EditText)findViewById(R.id.edittextu2);
    }

    public void userLogin(View view){
        String emailId=mUserEmailId.getText().toString();
        String password=mUserPassword.getText().toString();

        Intent uesrIntent=new Intent(UserLogin.this,UserProfile.class);
        startActivity(uesrIntent);
    }

    public void adminLogin(View view){
        Intent adminIntent=new Intent(UserLogin.this,AdminLogin.class);
        startActivity(adminIntent);
    }

    public void register(View view){
        Intent registerIntent=new Intent(UserLogin.this,Register.class);
        startActivity(registerIntent);
    }
}
