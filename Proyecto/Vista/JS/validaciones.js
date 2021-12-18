function validarRegistroDatos(){
    var flag = true;

    // Valida Boleta
    const validar_boleta = /^((PE)|(PP)|(\d{2}))\d{8}$/;
    flag = flag && validar_boleta.test(document.getElementById("boleta").value);
    if(!flag){
        alert("La boleta debe de ser 10 dígitos o dos letras (PE o PP) y 8 dígitos");
        document.getElementById("boleta").focus();
        return flag;
    }
    
    // Valida Nombre
    const validar_nombre = /^[A-Z\u00c1\u00c9\u00cd\u00d3\u00da\u00d1]{1}[a-z\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]*$/;
    flag = flag && validar_nombre.test(document.getElementById("nombre").value);
    if(!flag){
        alert("El nombre debe de constar de letras con la primera en mayúscula");
        document.getElementById("nombre").focus();
        return flag;
    }
    
    // Valida Apellido Paterno
    const validar_apellidoP = /^[A-Z\u00c1\u00c9\u00cd\u00d3\u00da\u00d1]{1}[a-z\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]*$/;
    flag = flag && validar_apellidoP.test(document.getElementById("apellido_p").value);
    if(!flag){
        alert("El apellido paterno debe de constar de letras con la primera en mayúscula");
        document.getElementById("apellido_p").focus();
        return flag;
    }

    // Valida Apellido Materno
    const validar_apellidoM = /^[A-Z\u00c1\u00c9\u00cd\u00d3\u00da\u00d1]{1}[a-z\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]*$/;
    flag = flag && validar_apellidoM.test(document.getElementById("apellido_m").value);
    if(!flag){
        alert("El apellido materno debe de constar de letras con la primera en mayúscula");
        document.getElementById("apellido_m").focus();
        return flag;
    }

    // Valida Genero
    if(document.getElementById("genero").value == "Ninguno"){
        alert("Debes de seleccionar tu genero");
        document.getElementById("genero").focus();
        return false;
    }

    // Valida CURP
    const validar_curp = /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}\d{6}(H|M)[A-Z]{2}[BCDFGHJKLMNPQRSTVWXYZ]{3}[A-Z0-9]{1}\d{1}$/;
    flag = flag && validar_curp.test(document.getElementById("curp").value);
    if(!flag){
        alert("El CURP no esta en el formato correcto");
        document.getElementById("curp").focus();
        return flag;
    }    

    // Valida Calle y numero
    const validar_calle = /^[A-Za-z0-9\s\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]+$/;
    flag = flag && validar_calle.test(document.getElementById("calle").value);
    if(!flag){
        alert("Calle y numero solo debe de contener letras y numeros");
        document.getElementById("calle").focus();
        return flag;
    }

    // Valida Colonia
    const validar_colonia = /^[A-Za-z\s\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]+$/;
    flag = flag && validar_colonia.test(document.getElementById("colonia").value);
    if(!flag){
        alert("Colonia solo debe de tener letras");
        document.getElementById("colonia").focus();
        return flag;
    }

    // Valida Alcaldia
    if(document.getElementById("alcaldia").value == "Ninguna"){
        alert("Debes de seleccionar una alcaldia");
        document.getElementById("alcaldia").focus();
        return false;
    }

    return flag;
}