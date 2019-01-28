package com.example.ramesh.quiz;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.SearchView;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    SearchView mSearchView;
    ListView mListView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mSearchView=(SearchView)findViewById(R.id.edittext);
        mListView=(ListView)findViewById(R.id.rootView);


        ArrayList<String> fieldOfQuiz=new ArrayList<String>();
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");
        fieldOfQuiz.add("computer quiz");

        ArrayAdapter<String> fieldOfQuizAdapter=new ArrayAdapter<String>(MainActivity.this,android.R.layout.simple_list_item_1,fieldOfQuiz);
        mListView.setAdapter(fieldOfQuizAdapter);
    }
}
