<template>
  <div id="app">
    <b-container>
      <Navbar />
      
      <Content />
    </b-container>
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
import Content from './components/Content.vue';

export default {
  name: 'app',
  components: {
    Navbar,
    Content
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
