package com.example.ramesh.quiz;

public class PlayedQuiz {

    private String quizName,playedTime;
    private int quizResult;

    public PlayedQuiz(String quizName,int quizResult,String playedTime){
        this.quizName=quizName;
        this.quizResult=quizResult;
        this.playedTime=playedTime;
    }

    public String getQuizName(){
        return quizName;
    }
    public String getPlayedTime(){
        return playedTime;
    }

    public int getQuizResult() {
        return quizResult;
    }
}
