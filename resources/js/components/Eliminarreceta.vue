<template>
<input
type="submit"
class="btn btn-danger d-block w-100 mb-2"
value="Eliminar x"
@click="eliminarReceta"
>
</template>
<script>
export default{
    props:['RecetaId'],
    methods:{
    eliminarReceta(){
    this.$swal({
    title:probando alerta',
    text:'Funciona bien!',
    icon:'success'
    })
    }
  }
}
</script>
