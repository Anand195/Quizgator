package com.example.ramesh.quiz;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

public class Register extends AppCompatActivity {

    private EditText mFirstName,mLastName,mMoNo,mEmailId,mPassword;
    DatabaseReference mRef;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register);

        mFirstName=(EditText)findViewById(R.id.fnameedittext);
        mLastName=(EditText)findViewById(R.id.lnameedittext);
        mMoNo=(EditText)findViewById(R.id.mo_noedittext);
        mEmailId=(EditText)findViewById(R.id.edittextr);
        mPassword=(EditText)findViewById(R.id.edittextr2);
        mRef=FirebaseDatabase.getInstance().getReference();
    }

    public void onSubmit(View view){
        String fName=mFirstName.getText().toString();
        String LName=mLastName.getText().toString();
        String mono=mMoNo.getText().toString();
        String emailId=mFirstName.getText().toString();
        String password=mFirstName.getText().toString();

        RegisterData registerData=new RegisterData(fName,LName,mono,emailId,password);

        mRef.child("user").push().setValue(registerData);

        Intent uesrIntent=new Intent(Register.this,UserProfile.class);
        startActivity(uesrIntent);
    }

    public void onReset(View view){
        mFirstName.setText(null);
        mLastName.setText(null);
        mMoNo.setText(null);
        mEmailId.setText(null);
        mPassword.setText(null);
    }

    public static  class RegisterData{
        public String fName,lName,moNo,emailId,password;

        RegisterData(){}
        RegisterData(String fName,String lName,String moNo,String emailId,String password){
            this.fName=fName;
            this.lName=lName;
            this.moNo=moNo;
            this.emailId=emailId;
            this.password=password;
        }
    }
}
