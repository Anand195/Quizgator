package com.example.ramesh.quiz;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;

public class ListOfQuizAdapter extends ArrayAdapter<CompleteQuiz> {

    public ListOfQuizAdapter(Context context, ArrayList<CompleteQuiz> listOfQuizs){
        super(context,0,listOfQuizs);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
       View listItemView = convertView;
        if(listItemView == null) {
            listItemView = LayoutInflater.from(getContext()).inflate(
                    R.layout.created_quiz_list_item, parent, false);
        }

        CompleteQuiz listOfQuiz=getItem(position);

        TextView quizname=(TextView)listItemView.findViewById(R.id.quiznamecreated);
        quizname.setText(listOfQuiz.getQuizname());

        TextView quizfield=(TextView)listItemView.findViewById(R.id.quizfield);
        quizfield.setText(listOfQuiz.getFieldname());

        TextView noofque=(TextView)listItemView.findViewById(R.id.noofquestionscreated);
        noofque.setText(String.valueOf(listOfQuiz.getNoofque()));

        TextView publishedon=(TextView)listItemView.findViewById(R.id.publishedoncreated);
        publishedon.setText(listOfQuiz.getPulishedOn());

        return listItemView;
    }
}
