<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>3D Model Viewer</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body,
    html {
      background: linear-gradient(to right, #4a90e2, #50e3c2);
      /* Gradiente de fundo */
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      /* Cor do texto */
      font-family: 'Arial', sans-serif;
    }

    .loading-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      width: 100vw;
      position: absolute;
      top: 0;
      left: 0;
      background-color: rgba(0, 0, 0, 0.8);
      /* Fundo escuro para o carregamento */
      z-index: 1000;
      border-radius: 15px;
      /* Bordas arredondadas */
    }

    .spinner-border {
      width: 4rem;
      height: 4rem;
      margin-bottom: 15px;
    }

    .loading-text {
      font-size: 20px;
      font-weight: bold;
      color: #ffffff;
      /* Cor do texto de carregamento */
    }

    model-viewer {
      width: 100vw;
      height: 100vh;
      max-width: 100vw;
      max-height: 100vh;
      border: 5px solid white;
      /* Borda do model viewer */
      border-radius: 15px;
      /* Bordas arredondadas */
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
      /* Sombra para dar profundidade */
    }

    .header {
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
      z-index: 1001;
      /* Para ficar acima do loading */
    }

    .header h1 {
      font-size: 2.5rem;
      margin: 0;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }
  </style>

  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</head>

<body>

  <div class="header">
    <h1>3D Model Viewer</h1>
  </div>

  <div class="loading-container" id="loading">
    <div class="spinner-border text-light" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <div id="loading-text" class="loading-text">Carregando 0%</div>
  </div>

  <model-viewer
    id="modelViewer"
    src="modelo_3d.glb"
    seamless-poster
    environment-image="neutral"
    shadow-intensity="0"
    autoplay
    ar
    ar-modes="webxr scene-viewer quick-look"
    camera-controls
    auto-rotate
    interaction-prompt="auto"
    interaction-prompt-style="basic"
    interaction-prompt-threshold="1500"
    enable-pan>
  </model-viewer>

  <script>
    const modelViewer = document.getElementById('modelViewer');
    const loadingText = document.getElementById('loading-text');

    modelViewer.addEventListener('progress', (event) => {
      const progress = Math.round(event.detail.totalProgress * 100);
      loadingText.textContent = `Carregando ${progress}%`;
    });

    modelViewer.addEventListener('load', () => {
      document.getElementById('loading').style.display = 'none';
    });
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>