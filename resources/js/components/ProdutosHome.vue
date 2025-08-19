<template>
  <section class="text-center">
    <h2 class="text-2xl font-semibold mb-4">Conheça nossos produtos</h2>
    <a href="/produtos" class="inline-block relative group">
      <!-- Imagem -->
      <img 
        src="./Images/image.jpg" 
        alt="Produtos" 
        class="rounded-xl shadow mx-auto cursor-pointer 
               transition-transform duration-300 
               hover:scale-105 active:scale-95"
      />
      <!-- Ícone SVG -->
      <span 
        class="absolute top-3 right-3 bg-[#162135] text-white p-1.5 rounded-md 
               opacity-80 group-hover:opacity-100 transition"
      >
        <svg xmlns="http://www.w3.org/2000/svg" 
             fill="none" viewBox="0 0 24 24" stroke-width="2" 
             stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" 
                d="M13.5 4.5H19.5M19.5 4.5V10.5M19.5 4.5L10.5 13.5M19.5 19.5H4.5V4.5" />
        </svg>
      </span>
    </a>
    <!-- Texto de ajuda só para mobile -->
    <p class="mt-2 text-sm text-gray-600 md:hidden">
      Toque na imagem para ver os produtos
    </p>
  </section>
</template>
