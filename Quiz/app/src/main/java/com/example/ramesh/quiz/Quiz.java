package com.example.ramesh.quiz;

import android.app.Application;

import com.google.firebase.FirebaseApp;

public class Quiz extends Application {

    @Override
    public void onCreate() {
        super.onCreate();

        FirebaseApp.initializeApp(this);
    }
}
