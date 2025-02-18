#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

// WiFi Credentials for Network 1
const char* ssid1 = "SISWA 33"; // Plis ubah sesuai kebutuhan
const char* password1 = "Siswa33!"; // Plis ubah sesuai kebutuhan
const char* host1 = "192.168.49.156"; // Plis ubah sesuai kebutuhan

// WiFi Credentials for Network 2
const char* ssid2 = "1681"; // Plis ubah sesuai kebutuhan
const char* password2 = "Adoptiongate2024"; // Plis ubah sesuai kebutuhan
const char* host2 = "192.168.23.39"; // Plis ubah sesuai kebutuhan

const char* currentHost = nullptr; // Initialize to nullptr

#define LED_PIN 15  // D8
#define SDA_PIN 2   // D4
#define RST_PIN 0   // D3
#define Buzzer_PIN 4 // D2

MFRC522 mfrc522(SDA_PIN, RST_PIN);

// Function to connect to a WiFi network (with timeout) and return the appropriate host
struct ConnectionResult {
  bool connected;
  const char* host;
};

ConnectionResult connectWiFi(const char* ssid, const char* password, const char* host) {
  WiFi.begin(ssid, password);
  Serial.print("Connecting to ");
  Serial.println(ssid);

  int attempts = 0;
  while (WiFi.status() != WL_CONNECTED && attempts < 10) { 
    delay(1000);
    Serial.print(".");
    attempts++;
  }

  ConnectionResult result;
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("");
    Serial.println("Connected to " + String(ssid));
    printWifiDetails();
    result.connected = true;
    result.host = host;  // Set the host for this network
    return result;
  } else {
    Serial.println("");
    Serial.println("Connection to " + String(ssid) + " failed.");
    result.connected = false;
    result.host = nullptr; // No host if not connected
    return result;
  }
}

void setup() {
  Serial.begin(9600);

  pinMode(LED_PIN, OUTPUT);
  pinMode(Buzzer_PIN, OUTPUT);

  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println("Dekatkan Kartu RFID Anda ke Reader");
  Serial.println();

  // Initial WiFi Connection Attempt
  ConnectionResult connection = connectWiFi(ssid1, password1, host1);
  if (!connection.connected) {
    connection = connectWiFi(ssid2, password2, host2);  // Try network 2
    if (!connection.connected) {
      Serial.println("Connection to both networks failed!");
      while (true) { // Halt and indicate error
        digitalWrite(LED_PIN, HIGH);
        digitalWrite(Buzzer_PIN, HIGH);
        delay(500);
        digitalWrite(LED_PIN, LOW);
        digitalWrite(Buzzer_PIN, LOW);
        delay(500);
      }
    }
  }
  currentHost = connection.host; // Assign to the global variable
}

void loop() {
  // Check WiFi connection and reconnect if necessary
  if (WiFi.status() != WL_CONNECTED) {
    Serial.println("WiFi disconnected. Attempting to reconnect...");
    ConnectionResult connection = connectWiFi(ssid1, password1, host1);
    if (!connection.connected) {
      connection = connectWiFi(ssid2, password2, host2);
    }
    if (connection.connected) {
      currentHost = connection.host;
    } else {
      Serial.println("Failed to reconnect to WiFi.");
      return;
    }
  }

  // Check RFID
  digitalWrite(LED_PIN, LOW);
  digitalWrite(Buzzer_PIN, LOW);

  if (mfrc522.PICC_IsNewCardPresent()) {  // Check for new card
    if (mfrc522.PICC_ReadCardSerial()) { // Read card data
      String IDTAG = "";
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        IDTAG += mfrc522.uid.uidByte[i];
      }

      Serial.println("Card read, ID: " + IDTAG);

      digitalWrite(LED_PIN, HIGH);
      digitalWrite(Buzzer_PIN, HIGH);
      delay(100);
      digitalWrite(LED_PIN, LOW);
      digitalWrite(Buzzer_PIN, LOW);

      // Send data if WiFi is connected and host is valid
      if (WiFi.status() == WL_CONNECTED && currentHost != nullptr) {
        WiFiClient client;
        const int httpPort = 80;

        if (client.connect(currentHost, httpPort)) {
          Serial.println("Connected to server");
          String Link = "http://" + String(currentHost) + "/presensi/kirimkartu.php?nokartu=" + IDTAG;
          HTTPClient http;
          http.begin(client, Link);
          int httpCode = http.GET();
          String payload = http.getString();
          Serial.println("HTTP Response: " + payload);
          http.end();
        } else {
          Serial.println("HTTP Connection Failed!");
        }
      } else {
        Serial.println("No WiFi connection or invalid host. Cannot send data.");
      }
      delay(1000); // Small delay after sending data.
    }
  }
}

void printWifiDetails() {
  Serial.println("Wifi Connected");
  Serial.println("IP Address : ");
  Serial.println(WiFi.localIP());
  Serial.println("MAC Address : ");
  Serial.println(WiFi.macAddress());
}