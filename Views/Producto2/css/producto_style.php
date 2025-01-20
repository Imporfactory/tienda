<style>
  .main-product-image {
    width: 400px;
    height: 400px;
    object-fit: cover;
  }

  .thumb-image {
    width: 60px;
    height: 60px;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 5px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .thumb-image:hover {
    transform: scale(1.1);
  }

  .thumbnail-container {
    margin-top: 10px;
  }


  .thumbnail-container img.active-thumb {
    border: 2px solid #000;
  }

  .btnAgregar_carrito {
    border: 2px solid <?php echo COLOR_TEXTO_CABECERA; ?> !important;
    color: <?php echo COLOR_HOVER_CABECERA; ?> !important;
    background-color: <?php echo COLOR_TEXTO_CABECERA; ?> !important;
    ;
    padding: 0.375rem 0.75rem;
    font-size: 21px !important;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .btnAgregar_carrito:hover {
    background-color: <?php echo COLOR_HOVER_CABECERA; ?> !important;
    color: <?php echo COLOR_TEXTO_CABECERA; ?> !important;
  }
</style>