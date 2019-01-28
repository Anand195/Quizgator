package com.example.ramesh.quiz;

public class ListOfQuiz {
    private String quizName,quizField;
    private int noOfQuestions;

    public ListOfQuiz(String quizName,int noOfQuestions,String quizField){
        this.noOfQuestions=noOfQuestions;
        this.quizName=quizName;
        this.quizField=quizField;
    }

    public ListOfQuiz(){}

    public String getQuizName(){
        return quizName;
    }
    public int getNoOfQuestions() {
        return noOfQuestions;
    }

    public String getQuizField() {
        return quizField;
    }
}
