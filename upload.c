#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

const char* ssid = "SISWA"; //Nama wifi yg dikonekin
const char* password = ""; //PW wifi yg dikonekin

const char* host = "192.168.114.39"; // IP komputer

#define LED_PIN 15 //D8
#define SDA_PIN 2 //D4
#define RST_PIN 0 //D3
#define Buzzer_PIN 4 //D2

MFRC522 mfrc522(SDA_PIN, RST_PIN);

void setup() {
  Serial.begin(9600);

  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid,password);

  while(WiFi.status() != WL_CONNECTED)
  {
    delay(5000);
    Serial.println(".");
  }

  Serial.println("Wifi Connected");
  Serial.println("IP Address : ");
  Serial.println(WiFi.localIP());

  pinMode(LED_PIN, OUTPUT);
  pinMode(Buzzer_PIN, OUTPUT);

  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println("Dekatkan Kartu RFID Anda ke Reader");
  Serial.println();

}

void loop() {  
  digitalWrite(LED_PIN, LOW);
  digitalWrite(Buzzer_PIN, LOW);

  if(! mfrc522.PICC_IsNewCardPresent())
    return ;
  
  if(! mfrc522.PICC_ReadCardSerial())
    return ;
  String IDTAG ="";
  for (byte i=0; i<mfrc522.uid.size; i++)
  {
    IDTAG += mfrc522.uid.uidByte[i];
  }
  digitalWrite(LED_PIN, HIGH);
  digitalWrite(Buzzer_PIN, HIGH);

  WiFiClient client;
  const int httpPort = 80;
  if(!client.connect(host, httpPort))
  {
    Serial.println("Connection Failed");
    return;
  }

  String Link;
  HTTPClient http;
  Link = "http://192.168.114.39/presensi/kirimkartu.php?nokartu=" + IDTAG;
  http.begin(client, Link);

  int httpCode = http.GET();
  String payload = http.getString();
  Serial.println(payload);
  http.end();

  delay(100);
}
