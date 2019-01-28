package com.example.ramesh.quiz;

import java.util.ArrayList;

public class CompleteQuiz{
    public String quizname,noofque,fieldname,pulishedOn;
    public ArrayList<QuestionsList> questions= new ArrayList<QuestionsList>();
    CompleteQuiz(){}
    CompleteQuiz(String quizname,String noofque,String fieldname,String pulishedOn,ArrayList<QuestionsList> questions){
        this.quizname=quizname;
        this.noofque=noofque;
        this.fieldname=fieldname;
        this.questions=questions;
        this.pulishedOn=pulishedOn;
    }

    public String getFieldname() {
        return fieldname;
    }

    public String getQuizname() {
        return quizname;
    }

    public String getNoofque() {
        return noofque;
    }

    public String getPulishedOn() {
        return pulishedOn;
    }

    public ArrayList<QuestionsList> getQuestions() {
        return questions;
    }
}
