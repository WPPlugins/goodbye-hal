<?php
/**
 * @package Goodbye_HAL
 * @version 1.0
 */
/*
Plugin Name: Goodbye HAL
Plugin URI: https://github.com/JeffSchering/goodbye-hal
Description: Based on the famous plugin 'Hello Dolly' by Matt Mullenweg, Goodbye HAL works just like it except that the lyrics are for the song Daisy Bell, which HAL 9000 sang as he was being de-activated in the movie '2001: A Space Odyssey'.
Version: 1.0
Author: Jeff Schering
Author URI: https://wordpress.org/support/profile/jeffsch
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function goodbye_hal_get_lyric() {
	/** These are the lyrics to Daisy Bell */
	$lyrics = "There is a flower
Within my heart,
Daisy, Daisy!
Planted one day
By a glancing dart,
Planted by Daisy Bell!
Whether she loves me
Or loves me not,
Sometimes it's hard to tell;
Yet I am longing to share the lot
Of beautiful Daisy Bell!

Daisy, Daisy,
Give me your answer do!
I'm half crazy,
All for the love of you!
It won't be a stylish marriage,
I can't afford a carriage
But you'll look sweet upon the seat
Of a bicycle built for two.

We will go tandem
As man and wife,
Daisy, Daisy! 
'Peddling' away
Down the road of life,
I and my Daisy Bell!
When the road's dark
We can both despise
P'licemen and lamps as well;
There are 'bright lights’
In the dazzling eyes
Of beautiful Daisy Bell!

Daisy, Daisy,
Give me your answer do!
I'm half crazy,
All for the love of you!
It won't be a stylish marriage,
I can't afford a carriage
But you'll look sweet upon the seat
Of a bicycle built for two.

I will stand by you In wheel or woe,
Daisy, Daisy!
You'll be the belle
Which I'll ring you know!
Sweet little Daisy Bell!
You'll take the lead
In each trip we take, 
Then if I don't do well, 
I will permit you to 
Use the brake, 
My beautiful Daisy Bell!

Daisy, Daisy,
Give me your answer do!
I'm half crazy,
All for the love of you!
It won't be a stylish marriage,
I can't afford a carriage,
But you'll look sweet upon the seat
Of a bicycle built for two.";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function goodbye_hal() {
	$chosen = goodbye_hal_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'goodbye_hal' );

// We need some CSS to position the paragraph
function hal_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'hal_css' );

?>