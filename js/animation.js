function closeScreen(){
  if(confirm("Você quer cancelar? Aperte 'OK'")){
    open('', '_self', '');
    self.close();
  }
}
