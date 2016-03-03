-- This exported fuction is called from website.php
-- the 'message' argument here is passed from the second parameter of the 'call'
-- method. And the returned value goes back to PHP.
function functionCalledFromPHP(message)
    outputDebugString(message)
    return getNetworkStats()
end
