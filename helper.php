<?php
/**
 * Write File
 *
 * Writes data to the file specified in the path.
 * Creates a new file if non-existent.
 *
 * @param string $path File path
 * @param string $data Data to write
 * @param string $mode fopen() mode (default: 'wb')
 *
 * @return    bool
 */
function write_file( string $path, string $data, string $mode = 'wb' ): bool {

	if ( ! $fp = @fopen( $path, $mode ) ) {
		return false;
	}

	flock( $fp, LOCK_EX );

	for ( $result = $written = 0, $length = strlen( $data ); $written < $length; $written += $result ) {
		if ( ( $result = fwrite( $fp, substr( $data, $written ) ) ) === false ) {
			break;
		}
	}

	flock( $fp, LOCK_UN );
	fclose( $fp );

	return is_int( $result );
}


/**
 * helper function that takes a string and gives the output with uppercase the first <br>
 * character
 *
 *
 * @param $args
 *
 * @return string
 */
function __( $args ): string {
	return ucfirst( $args );
}