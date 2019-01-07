package ws.datamate.arsho.lnc;

import android.app.Activity;
import android.content.Intent;
import android.content.res.Configuration;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuItem;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {
    WebView lncWV;
    String url = "http://192.168.1.25/lnc";
    private CustomSharedPreference customSharedPreference;

    Activity context = this;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        lncWV = (WebView) findViewById(R.id.lncWV);

        lncWV.setWebViewClient(new MyBrowser());


        customSharedPreference = new CustomSharedPreference();


        //Retrieve a value from SharedPreference
        String returnStr = customSharedPreference.getValue(context);
        if (returnStr != null) {
            url = returnStr;
        }

        lncWV.getSettings().setLoadsImagesAutomatically(true);
        lncWV.getSettings().setJavaScriptEnabled(true);
        lncWV.loadUrl(url);


    }

    @Override
    public void onConfigurationChanged(Configuration newConfig) {
        super.onConfigurationChanged(newConfig);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // TODO Auto-generated method stub
        if (item.getItemId() == R.id.action_home) {
            Intent intent_first_activity = new Intent(getApplicationContext(), MainActivity.class);
            startActivity(intent_first_activity);
            finish();
        } else if (item.getItemId() == R.id.action_settings) {
            Intent intent_second_activity = new Intent(getApplicationContext(), ServerSettingActivity.class);
            startActivity(intent_second_activity);
            finish();
        }
        return super.onOptionsItemSelected(item);
    }

}

class MyBrowser extends WebViewClient {
    @Override
    public boolean shouldOverrideUrlLoading(WebView view, String url) {
        view.loadUrl(url);
        return true;
    }
}