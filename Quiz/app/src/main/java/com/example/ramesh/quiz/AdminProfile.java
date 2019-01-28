package com.example.ramesh.quiz;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.database.ChildEventListener;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class AdminProfile extends AppCompatActivity {

    public static final String TAG="AdminProfile";
    private TextView mAdminName;
    private ListView mCreateQuizList;
    DatabaseReference mRef;
    ArrayList<CompleteQuiz> quizlist=new ArrayList<CompleteQuiz>();
    CompleteQuiz quiz;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.adminprofile);

        mAdminName=(TextView)findViewById(R.id.adminname);
        mCreateQuizList=(ListView)findViewById(R.id.createdquizlist);

        mRef= FirebaseDatabase.getInstance().getReference("quiz");

        mRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                for(DataSnapshot quizSnapshot: dataSnapshot.getChildren()){
                    quiz = quizSnapshot.getValue(CompleteQuiz.class);
                    quizlist.add(quiz);
                }

                ListOfQuizAdapter listOfQuizAdapter=new ListOfQuizAdapter(AdminProfile.this,quizlist);
                mCreateQuizList.setAdapter(listOfQuizAdapter);

            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });

    }
    public void onCreateQuiz(View view){
        Intent createQuiz=new Intent(AdminProfile.this,CreateQuiz.class);
        startActivity(createQuiz);
    }
}
