package com.example.ramesh.quiz;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ListView;
import android.widget.TextView;

import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.ArrayList;

public class QuizData extends AppCompatActivity {

    int i=0;
    private TextView mQuizName;
    private ListView mQuizDataList;
    private DatabaseReference mRef;
    private ArrayList<QuestionsList> mQuestionsLists=new ArrayList<QuestionsList>();
    private String quizname;
    private static final String TAG="QuizData";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.quizdata);

        quizname = this.getIntent().getExtras().getString("quizname");

        mQuizName=(TextView)findViewById(R.id.specificquizname);
        mQuizName.setText(quizname);
        mQuizDataList=(ListView)findViewById(R.id.quizdatalist);

        mQuestionsLists = getIntent().getExtras().getParcelableArrayList("questions");
        ListOfQuizDataAdapter mListOfQuizDataAdapter=new ListOfQuizDataAdapter(QuizData.this,mQuestionsLists);
        mQuizDataList.setAdapter(mListOfQuizDataAdapter);
    }

    public void onSubmit(View view){

    }
    public void onOtion(View view){

    }
}
