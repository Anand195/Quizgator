package com.example.ramesh.quiz;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.io.Serializable;
import java.util.ArrayList;

public class QuizList extends AppCompatActivity implements Serializable {

    public QuizList activity;
    private ListView mQuizList;
    private DatabaseReference mRef;
    private ArrayList<CompleteQuiz> completeQuizs=new ArrayList<CompleteQuiz>();
    private CompleteQuiz completeQuiz;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.quizlist);

        mQuizList = (ListView) findViewById(R.id.quizlist);

        mRef= FirebaseDatabase.getInstance().getReference("quiz");
        mRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                for(DataSnapshot quizSnapshot : dataSnapshot.getChildren()){
                    completeQuiz = quizSnapshot.getValue(CompleteQuiz.class);
                    completeQuizs.add(completeQuiz);
                }

                QuizListAdapter quizListAdapter = new QuizListAdapter(QuizList.this,completeQuizs);
                mQuizList.setAdapter(quizListAdapter);
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }

    public class QuizListAdapter extends ArrayAdapter<CompleteQuiz> {

        public QuizListAdapter(Context context, ArrayList<CompleteQuiz> completeQuizs) {
            super(context, 0, completeQuizs);
        }

        @NonNull
        @Override
        public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
            View listItemView = convertView;
            if(listItemView == null) {
                listItemView = LayoutInflater.from(getContext()).inflate(
                        R.layout.quiz_list_item, parent, false);
            }

            final CompleteQuiz listOfQuiz=getItem(position);

            TextView quizname1=(TextView)listItemView.findViewById(R.id.quizname);
            quizname1.setText(listOfQuiz.getQuizname());

            TextView quizfield=(TextView)listItemView.findViewById(R.id.quizfield);
            quizfield.setText(listOfQuiz.getFieldname());

            TextView noofque=(TextView)listItemView.findViewById(R.id.noofquestions);
            noofque.setText(String.valueOf(listOfQuiz.getNoofque()));

            TextView publishedon=(TextView)listItemView.findViewById(R.id.publishedon);
            publishedon.setText(listOfQuiz.getPulishedOn());

            final Button play=(Button) listItemView.findViewById(R.id.play);
            play.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    onPlay(view, listOfQuiz.getQuestions(),listOfQuiz.getQuizname());
                }
            });


            return listItemView;
        }
    }

    public void onPlay(View view, ArrayList<QuestionsList> questionsList,String quizname) {
        Intent intent = new Intent(QuizList.this, QuizData.class);
        intent.putExtra("quizname",String.valueOf(quizname));
        Bundle bundle = new Bundle();
        bundle.putParcelableArrayList("questions", questionsList);
        intent.putExtras(bundle);
        startActivity(intent);
    }


}
