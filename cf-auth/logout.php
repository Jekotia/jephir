<?php

if (jf_logout($_))
echo <<< EOT
	Logout successful.<br/>
	You will be automatically redirected to the home page in 5 seconds.
	<script language="JavaScript">
		setTimeout('pageRedirect("$_[web_root]")', 5000)
	</script>
EOT;
null;