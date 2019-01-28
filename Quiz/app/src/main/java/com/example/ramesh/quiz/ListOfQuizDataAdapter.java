package com.example.ramesh.quiz;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.TextView;

import org.w3c.dom.Text;

import java.util.ArrayList;

public class ListOfQuizDataAdapter extends ArrayAdapter<QuestionsList> {

    public ListOfQuizDataAdapter(Context context,ArrayList<QuestionsList> listOfQuizDatas){
        super(context,0,listOfQuizDatas);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        View listItemView = convertView;
        if(listItemView == null) {
            listItemView = LayoutInflater.from(getContext()).inflate(
                    R.layout.quiz_data_list_item, parent, false);
        }

        QuestionsList listOfQuizData=getItem(position);

        TextView question=(TextView)listItemView.findViewById(R.id.question);
        question.setText(listOfQuizData.getQuestion());

        Button option1=(Button)listItemView.findViewById(R.id.option1);
        option1.setText(listOfQuizData.getOptionA());

        Button option2=(Button)listItemView.findViewById(R.id.option2);
        option2.setText(listOfQuizData.getOptionB());

        Button option3=(Button)listItemView.findViewById(R.id.option3);
        option3.setText(listOfQuizData.getOptionC());

        Button option4=(Button)listItemView.findViewById(R.id.option4);
        option4.setText(listOfQuizData.getOptionD());

        return listItemView;
    }
}
