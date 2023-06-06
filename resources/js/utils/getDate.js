export function getDate() {
    const currentDate = new Date();
    const day = String(currentDate.getDate()).padStart(2, '0');
    const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Les mois sont indexés à partir de zéro, nous ajoutons donc 1
    const year = currentDate.getFullYear();
    
    return `${day}.${month}.${year}`;
  }
  