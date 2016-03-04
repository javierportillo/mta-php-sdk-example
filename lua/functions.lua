-- This exported fuction is called from website.php
-- the 'message' argument here is passed from the second parameter of the 'call'
-- method in PHP. And the returned value goes back to PHP.
function functionCalledFromPHP(message)
    outputDebugString(message)
    return getNetworkStats()
end

-- The example below shows how you can use the PHP SDK to send data over to PHP using
-- the callRemote function. This function is asynchronous, wich is just a fancy word
-- for saying that you can't just store the returned values in a variable, instead you
-- have to create another function for callRemote to call back whenever the results are
-- delivered from PHP back to MTA.
function getAnimalDNASector(player, cmd, animal)
    -- First argument is the URL where your php file is located.
    -- Second argument is the callback function that receives the data from PHP.
    -- The rest are a list of optional arguments that you may want to send.
    callRemote('http://127.0.0.1:8000/animal_dna.php', animalDNAResult, animal)
end

-- Once the PHP script finishes, the callback function is called. The mta::doReturn();
-- method is used to pass arguments back to this function. If no parameters are declared
-- in the doReturn method, you still have to declare two arguments in the callback function
-- that you can use when errors occur to catch the error message.
-- If there's an error, the first argument will contain the string "ERROR". The second
-- argument contains an integer with the error code, for example: 404 (if the requested
-- file was not found).
function animalDNAResult(animal, dna_sequence)
    outputDebugString('First sector of DNA for ' .. animal)
    outputDebugString(dna_sequence)
end

-- For this example I've used PHP to get the first sector of the DNA sequence of a couple
-- animals. For the time being, you can only get the DNA sequence for alpaca and dolphin.
addCommandHandler('getdna', getAnimalDNASector)
