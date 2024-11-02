plugins {
    alias(libs.plugins.android.application)
}

android {
    namespace = "com.example.appbanhang"
    compileSdk = 34

    defaultConfig {
        applicationId = "com.example.appbanhang"
        minSdk = 24
        targetSdk = 34
        versionCode = 1
        versionName = "1.0"

        testInstrumentationRunner = "androidx.test.runner.AndroidJUnitRunner"
    }

    buildTypes {
        release {
            isMinifyEnabled = false
            proguardFiles(
                getDefaultProguardFile("proguard-android-optimize.txt"),
                "proguard-rules.pro"
            )
        }
    }
    compileOptions {
        sourceCompatibility = JavaVersion.VERSION_1_8
        targetCompatibility = JavaVersion.VERSION_1_8
    }
    buildFeatures{
        viewBinding = true
        dataBinding = true
    }
}

dependencies {

    implementation(libs.appcompat)
    implementation(libs.material)
    implementation(libs.activity)
    implementation(libs.constraintlayout)
    implementation(libs.navigation.fragment)
    implementation(libs.navigation.ui)
    testImplementation(libs.junit)
    androidTestImplementation(libs.ext.junit)
    androidTestImplementation(libs.espresso.core)
    // glider
    dependencies {
        implementation("com.github.bumptech.glide:glide:4.16.0")
        annotationProcessor ("com.github.bumptech.glide:compiler:4.16.0")
    }
    dependencies {
        // RxJava
        implementation("io.reactivex.rxjava3:rxandroid:3.0.0")
        implementation("io.reactivex.rxjava3:rxjava:3.0.0")

        // Retrofit
        implementation("com.squareup.retrofit2:retrofit:2.9.0")
        implementation("com.squareup.retrofit2:converter-gson:2.9.0")

        // RxJava-Retrofit Adapter
        implementation("com.github.akarnokd:rxjava3-retrofit-adapter:3.0.0")

        //Neumorphism
        implementation ("com.github.fornewid:neumorphism:0.3.2")

        //image pick
        implementation ("com.github.dhaval2404:imagepicker:2.1")

        //eventbus
        implementation ("org.greenrobot:eventbus:3.3.1")

    }

}



