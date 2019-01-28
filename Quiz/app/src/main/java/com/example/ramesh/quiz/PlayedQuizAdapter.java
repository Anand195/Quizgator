package com.example.ramesh.quiz;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import java.util.ArrayList;

public class PlayedQuizAdapter extends ArrayAdapter<PlayedQuiz> {

    public PlayedQuizAdapter(Context context, ArrayList<PlayedQuiz> playedQuizs){
        super(context,0,playedQuizs);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        View listItemView = convertView;
        if(listItemView == null) {
            listItemView = LayoutInflater.from(getContext()).inflate(
                    R.layout.quiz_played_list_item, parent, false);
        }

        PlayedQuiz playedQuiz=getItem(position);

        TextView quizname=(TextView)listItemView.findViewById(R.id.quiznamep);
        quizname.setText(playedQuiz.getQuizName());

        TextView quizresult=(TextView)listItemView.findViewById(R.id.result);
        quizresult.setText(String.valueOf(playedQuiz.getQuizResult()));

        TextView playtime=(TextView)listItemView.findViewById(R.id.playtime);
        playtime.setText(playedQuiz.getPlayedTime());

        return listItemView;
    }
}
