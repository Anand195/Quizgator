package com.example.ramesh.quiz;

import android.os.Parcel;
import android.os.Parcelable;

import java.io.Serializable;

public  class QuestionsList implements Parcelable {
    public String question, optionA, optionB, optionC, optionD,rightAns;

    public QuestionsList(String question, String optionA, String optionB, String optionC, String optionD,String rightAns) {
        this.question = question;
        this.optionA = optionA;
        this.optionB = optionB;
        this.optionC = optionC;
        this.optionD = optionD;
        this.rightAns=rightAns;
    }

    public  QuestionsList(){}

    public QuestionsList(Parcel in){}

    public String getQuestion() {
        return question;
    }
    public String getOptionA() {
        return optionA;
    }
    public String getOptionB() {return optionB; }
    public String getOptionC() {
        return optionC;
    }
    public String getOptionD() {
        return optionD;
    }

    public String getRightAns() {
        return rightAns;
    }

    @Override
    public void writeToParcel(Parcel parcel, int i) {
        parcel.writeString(question);
        parcel.writeString(optionA);
        parcel.writeString(optionB);
        parcel.writeString(optionC);
        parcel.writeString(optionD);
        parcel.writeString(rightAns);
    }

    @Override
    public int describeContents() {
        return 0;
    }

    public static final Creator<QuestionsList> CREATOR = new Creator<QuestionsList>() {
        @Override
        public QuestionsList createFromParcel(Parcel in) {

            return new QuestionsList(in);
        }

        @Override
        public QuestionsList[] newArray(int size) {
            return new QuestionsList[size];
        }
    };
}
