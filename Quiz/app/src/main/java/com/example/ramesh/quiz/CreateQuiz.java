package com.example.ramesh.quiz;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.EditText;
import android.widget.TextView;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ListView;
import android.widget.TextView;

import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import java.util.ArrayList;


public class CreateQuiz extends AppCompatActivity {

    public static final String TAG = "CreatQuiz";
    private EditText mEnterQuizName, mEnterNoOfQuestions, mEnterFieldOfQuiz;
    private EditText mEnterQuestion, mEnterOption1, mEnterOption2, mEnterOption3, mEnterOption4, mEnterRightAns;
    private TextView mString;
    private String noOfQuestions, quiz, fieldofquiz;
    private int i = 0, noOfQue, queNo = 0;
    private ArrayList<QuestionsList> questionsLists = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.createquiz);

        mEnterQuizName = (EditText) findViewById(R.id.enterquizname);
        mEnterFieldOfQuiz = (EditText) findViewById(R.id.enterfieldofquiz);
        mEnterNoOfQuestions = (EditText) findViewById(R.id.enternoofque);

        mEnterQuestion = (EditText) findViewById(R.id.craetequeedittext);
        mEnterOption1 = (EditText) findViewById(R.id.addop1);
        mEnterOption2 = (EditText) findViewById(R.id.addop2);
        mEnterOption3 = (EditText) findViewById(R.id.addop3);
        mEnterOption4 = (EditText) findViewById(R.id.addop4);
        mEnterRightAns = (EditText) findViewById(R.id.rightans);

        mString = (TextView) findViewById(R.id.textc);
    }

    public void onCreate(View view) {

        quiz = mEnterQuizName.getText().toString();
        fieldofquiz = mEnterFieldOfQuiz.getText().toString();
        CompleteQuiz completeQuiz = new CompleteQuiz(quiz, noOfQuestions, fieldofquiz, null, questionsLists);

        FirebaseDatabase database = FirebaseDatabase.getInstance();
        DatabaseReference mRef = database.getReference();
        mRef.child("quiz").push().setValue(completeQuiz);

        Intent create = new Intent(CreateQuiz.this, AdminProfile.class);
        startActivity(create);
    }

    public void onCreateQue(View view) {
        noOfQuestions = mEnterNoOfQuestions.getText().toString();
        try {
            noOfQue = Integer.parseInt(noOfQuestions);
        } catch (NumberFormatException e) {
            Log.i(TAG, e.getMessage());
        }
        i++;
        if (i <= noOfQue) {
            queNo = noOfQue - (noOfQue - (i + 1));
            String str = "Enter Question No:" + queNo;
            mString.setText(str);

            String que = mEnterQuestion.getText().toString();
            String op1 = mEnterOption1.getText().toString();
            String op2 = mEnterOption2.getText().toString();
            String op3 = mEnterOption3.getText().toString();
            String op4 = mEnterOption4.getText().toString();
            String right = mEnterRightAns.getText().toString();

            QuestionsList question = new QuestionsList(que, op1, op2, op3, op4, right);
            questionsLists.add(question);
            resetQue();
            if (i == noOfQue) {
                mString.setText("You Have Entered All Questions.");
            }
        }
        if (i > noOfQue) {
            mString.setText("You Can't Enter More Questions!!");
            mString.setBackgroundColor(getResources().getColor(R.color.red));
        }
    }

    private void resetQue() {
        mEnterQuestion.setText(null);
        mEnterOption1.setText(null);
        mEnterOption2.setText(null);
        mEnterOption3.setText(null);
        mEnterOption4.setText(null);
        mEnterRightAns.setText(null);
    }

    public void onResetQue(View view) {
        mEnterQuestion.setText(null);
        mEnterOption1.setText(null);
        mEnterOption2.setText(null);
        mEnterOption3.setText(null);
        mEnterOption4.setText(null);
        mEnterRightAns.setText(null);
    }

}
