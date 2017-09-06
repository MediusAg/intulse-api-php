# intulse-api-php

Written and maintained by MediusAg LLC<br />
https://mediusag.com/

PHP wrapper for the Intulse Phone API<br />
Intulse Company Website: https://www.intulse.com/<br />
Intulse API Documentation: https://dashboard.intulse.com/docs/<br />

Example:

$intulse = new \IntulseApiPhp\Intulse( INTULSE_API_KEY );<br />
$intulse->call()->originate( $extension, $phone_number );
