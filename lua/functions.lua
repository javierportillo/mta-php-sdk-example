-- This exported fuction is called from website.php
-- the 'message' argument here is passed from the second parameter of the 'call'
-- method. And the returned value goes back to PHP.
function functionCalledFromPHP(message)
    outputDebugString(message)
    return getNetworkStats()
end

function getAnimalDNASector(player, cmd, animal)
    callRemote('http://127.0.0.1:8000/animal_dna.php',animalDNAResult, animal)
end

function animalDNAResult(animal, dna_sequence)
    outputDebugString('First sector of DNA for ' .. animal)
    outputDebugString(dna_sequence)
end

addCommandHandler('getdna', getAnimalDNASector)
