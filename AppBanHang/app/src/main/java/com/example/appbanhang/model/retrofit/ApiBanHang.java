package com.example.appbanhang.model.retrofit;

import android.database.Observable;

import com.example.appbanhang.model.LoaiSpModel;

import retrofit2.http.GET;

public interface ApiBanHang {
    @GET("getloaisp.php")
    Observable<LoaiSpModel> getLoaiSp();
}
