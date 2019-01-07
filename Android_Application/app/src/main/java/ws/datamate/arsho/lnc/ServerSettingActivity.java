package ws.datamate.arsho.lnc;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class ServerSettingActivity extends AppCompatActivity {

    EditText serverAddressEt;
    Button serverAddressBtn;
    private CustomSharedPreference customSharedPreference;

    Activity context = this;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_server_setting);
        customSharedPreference = new CustomSharedPreference();

        serverAddressEt=(EditText)findViewById(R.id.serverAddressEt);
        serverAddressBtn=(Button)findViewById(R.id.serverAddressBtn);
    }


    public void serverAddressBtnClickListener(View view){
        String serverAddressEtStr=serverAddressEt.getText().toString();
        customSharedPreference.save(context, serverAddressEtStr);
        Toast.makeText(getBaseContext(),"Server address is saved successfully",Toast.LENGTH_SHORT).show();
        Intent intent_first_activity = new Intent(getApplicationContext(), MainActivity.class);
        startActivity(intent_first_activity);
        finish();
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
