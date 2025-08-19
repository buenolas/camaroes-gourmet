<template>
  <div class="font-sans bg-[#D9D5BC] min-h-screen text-[#162135]">
    <!-- Header fixo -->
    <header class="bg-[#162135] p-4 shadow-md fixed top-0 left-0 right-0 z-50">
      <div class="grid grid-cols-3 items-center">
        <div><Logo /></div>
        <h1 class="text-white font-bold text-2xl sm:text-3xl text-center">Camarões</h1>
        <nav class="hidden md:flex justify-end gap-6 text-white font-medium">
          <a href="#" @click.prevent="scrollToTop" class="hover:text-gray-300 transition">Home</a>
          <a href="/produtos" class="hover:text-gray-300 transition">Produtos</a>
        </nav>
      </div>
      <nav class="flex md:hidden justify-center gap-6 mt-3 text-white font-medium">
        <a href="#" @click.prevent="scrollToTop" class="hover:text-gray-300 transition">Home</a>
        <a href="/produtos" class="hover:text-gray-300 transition">Produtos</a>
      </nav>
    </header>

    <!-- Main com padding-top -->
    <main ref="mainContent" class="max-w-6xl mx-auto p-6 space-y-12 pt-28 transition-all duration-500">
      <Apresentacao />
      <Produtos />
      <Imagem />
      <Localizacao />
      <Horarios />
      <Faq />
      <Contatos />
    </main>

    <footer class="bg-[#E46800] text-white p-6 text-center">
      © 2025 Camarões. Todos os direitos reservados.
    </footer>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Logo from "@/components/Logo.vue";
import Apresentacao from "@/components/Apresentacao.vue";
import Produtos from "@/components/ProdutosHome.vue";
import Imagem from "@/components/Imagem.vue";
import Localizacao from "@/components/Localizacao.vue";
import Horarios from "@/components/Horarios.vue";
import Faq from "@/components/Faq.vue";
import Contatos from "@/components/Contatos.vue";

const mainContent = ref(null);

const scrollToTop = () => {
  if (!mainContent.value) return;

  const el = mainContent.value;
  // Adiciona blur inicial
  el.style.filter = "blur(4px)";
  el.style.opacity = "0.8";

  // Scroll suave
  window.scrollTo({ top: 0, behavior: "smooth" });

  // Remove blur após animação
  setTimeout(() => {
    el.style.transition = "filter 0.6s ease, opacity 0.6s ease";
    el.style.filter = "blur(0)";
    el.style.opacity = "1";
  }, 100); // delay curto para garantir que o scroll comece
};
</script>

<style>
html {
  scroll-behavior: smooth;
}
</style>
