<?php include('header.php'); ?>

<body>
    <div class="container-fluid main-container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="content-wrapper text-center p-5" style="background: rgba(255, 255, 255, 0.95); border-radius: 20px; box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2); max-width: 450px;">
            <div class="mb-4">
                <h1 class="title text-primary mb-3">✨ Além dos Signos ✨</h1>
                <p class="subtitle text-muted mb-4">Descubra os segredos que as estrelas têm para você!</p>
            </div>

            <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                <div class="form-group mb-4">
                    <label for="data_nascimento" class="form-label text-secondary mb-3" style="font-weight: 500; font-size: 1.1rem;">
                        📅 Quando você nasceu?
                    </label>
                    <input
                        type="date"
                        class="form-control"
                        id="data_nascimento"
                        name="data_nascimento"
                        required
                        style="border-radius: 10px; border: 2px solid #e9ecef; padding: 12px; font-size: 1rem; transition: all 0.3s ease;"
                        onchange="this.style.borderColor='#007bff'">
                </div>

                <button type="submit" class="btn btn-primary mt-3 w-100" style="
                    background: linear-gradient(135deg, #F0941F, #196774);
                    border: none;
                    border-radius: 25px;
                    padding: 15px;
                    font-size: 1.1rem;
                    font-weight: bold;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
                "
                    onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 6px 20px rgba(102, 126, 234, 0.4)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(102, 126, 234, 0.3)'">
                    🔮 Descobrir Meu Signo
                </button>
            </form>

            <!-- Seção com preview dos signos -->
            <div class="mt-5">
                <h6 class="text-muted mb-3">Os 12 Signos do Zodíaco:</h6>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♈ Áries</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♉ Touro</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♊ Gêmeos</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♋ Câncer</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♌ Leão</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♍ Virgem</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♎ Libra</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♏ Escorpião</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♐ Sagitário</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♑ Capricórnio</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♒ Aquário</span>
                    <span class="badge bg-secondary" style="font-size: 0.9rem; padding: 8px 12px; border-radius: 15px;">♓ Peixes</span>
                </div>
            </div>

            <footer class="footer mt-5">
                <p class="text-muted" style="font-size: 0.9rem;">
                    💻 Desenvolvido por: <strong>Malrley</strong>
                </p>
            </footer>
        </div>
    </div>

    <!-- JavaScript para melhorar a experiência -->
    <script>
        // Adicionar efeitos visuais ao formulário
        document.getElementById('data_nascimento').addEventListener('focus', function() {
            this.style.borderColor = '#667eea';
            this.style.boxShadow = '0 0 10px rgba(102, 126, 234, 0.2)';
        });

        document.getElementById('data_nascimento').addEventListener('blur', function() {
            if (!this.value) {
                this.style.borderColor = '#e9ecef';
                this.style.boxShadow = 'none';
            }
        });

        // Animação de entrada
        window.addEventListener('load', function() {
            document.querySelector('.content-wrapper').style.animation = 'fadeInUp 0.6s ease-out';
        });
    </script>
</body>