package com.example.ramesh.quiz;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;

public class UserProfile extends AppCompatActivity {

    private TextView mUserName;
    private ListView mPlayedQuizList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.userprofile);

        mUserName=(TextView)findViewById(R.id.username);
        mPlayedQuizList=(ListView)findViewById(R.id.quizplayedlist);

    }

    public void onPlayMoreQuiz(View view){
        Intent intent=new Intent(UserProfile.this,QuizList.class);
        startActivity(intent);
    }
}
