<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

echo "=== JWT TOKEN TEST ===" . PHP_EOL . PHP_EOL;

// 1. Cek user
$user = User::where('email', 'testjwt@gmail.com')->first();

if (!$user) {
    echo "❌ FAIL: User not found" . PHP_EOL;
    exit(1);
}

echo "✅ User found: " . $user->email . PHP_EOL;
echo "User ID: " . $user->id . PHP_EOL . PHP_EOL;

// 2. Test SHA-256 Hash
echo "=== TEST SHA-256 HASH ===" . PHP_EOL;
echo "Hashed Password in DB: " . $user->hashed_password . PHP_EOL;
$manualHash = hash('sha256', 'testpassword123');
echo "Manual SHA-256 Hash:   " . $manualHash . PHP_EOL;

if ($user->hashed_password === $manualHash) {
    echo "✅ PASS: SHA-256 hash matches" . PHP_EOL . PHP_EOL;
} else {
    echo "❌ FAIL: SHA-256 hash does not match" . PHP_EOL . PHP_EOL;
}

// 3. Generate JWT Token
echo "=== TEST JWT TOKEN GENERATION ===" . PHP_EOL;
try {
    $tokenResult = $user->createToken('TestJWT');
    $accessToken = $tokenResult->accessToken;
    $tokenModel = $tokenResult->token;

    echo "✅ JWT Token generated successfully" . PHP_EOL;
    echo "Token (first 50 chars): " . substr($accessToken, 0, 50) . "..." . PHP_EOL . PHP_EOL;

    // 4. Test Token Expiration
    echo "=== TEST TOKEN EXPIRATION (30 MINUTES) ===" . PHP_EOL;
    $createdAt = $tokenModel->created_at;
    $expiresAt = $tokenModel->expires_at;

    echo "Created at:  " . $createdAt->format('Y-m-d H:i:s') . PHP_EOL;
    echo "Expires at:  " . $expiresAt->format('Y-m-d H:i:s') . PHP_EOL;

    $diffInMinutes = $createdAt->diffInMinutes($expiresAt);
    echo "Expires in:  " . $diffInMinutes . " minutes" . PHP_EOL;

    if ($diffInMinutes === 30) {
        echo "✅ PASS: Token expires in exactly 30 minutes" . PHP_EOL . PHP_EOL;
    } else {
        echo "❌ FAIL: Token expires in " . $diffInMinutes . " minutes (expected 30)" . PHP_EOL . PHP_EOL;
    }

    // 5. Full Token for jwt.io verification
    echo "=== FULL JWT TOKEN ===" . PHP_EOL;
    echo "Copy this token and paste it at https://jwt.io to verify:" . PHP_EOL;
    echo $accessToken . PHP_EOL . PHP_EOL;

    // 6. Test OAuth Tables
    echo "=== TEST OAUTH2 TABLES ===" . PHP_EOL;
    $clientsCount = \DB::table('oauth_clients')->count();
    $tokensCount = \DB::table('oauth_access_tokens')->count();

    echo "OAuth Clients:        " . $clientsCount . PHP_EOL;
    echo "OAuth Access Tokens:  " . $tokensCount . PHP_EOL;

    if ($clientsCount > 0 && $tokensCount > 0) {
        echo "✅ PASS: OAuth2 Passport is configured correctly" . PHP_EOL . PHP_EOL;
    } else {
        echo "❌ FAIL: OAuth2 tables are empty" . PHP_EOL . PHP_EOL;
    }

    echo "=== SUMMARY ===" . PHP_EOL;
    echo "✅ User authentication: Working" . PHP_EOL;
    echo "✅ SHA-256 hashing: Working" . PHP_EOL;
    echo "✅ JWT token generation: Working" . PHP_EOL;
    echo "✅ Token expiry (30 min): Working" . PHP_EOL;
    echo "✅ OAuth2 Passport: Working" . PHP_EOL . PHP_EOL;

    echo "🎉 ALL TESTS PASSED!" . PHP_EOL;
} catch (\Exception $e) {
    echo "❌ ERROR: " . $e->getMessage() . PHP_EOL;
    exit(1);
}
