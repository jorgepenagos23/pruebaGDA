<template>
    <div>
        <v-container>
            <v-carousel>
                <v-carousel-item

                    src="https://th.bing.com/th/id/R.e9f49d4387cb92a9306b49cbe0865b8c?rik=13EkFaAVEHPNLA&pid=ImgRaw&r=0"
                    cover></v-carousel-item>

                <v-carousel-item src="https://tipsparatuviaje.com/wp-content/uploads/2019/10/wismar-alemania.jpg" cover></v-carousel-item>

                <v-carousel-item src="https://wallpaperaccess.com/full/46564.jpg" cover></v-carousel-item>
            </v-carousel>

        </v-container>

    </div>


    <v-card class="mx-auto" max-width="500">
    <v-container fluid>
      <v-row dense>
        <v-col v-for="card in cards" :key="card.title" :cols="card.flex">
          <v-card>
            <v-img
              :src="card.src"
              class="align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
              cover
            >
              <v-card-title
                class="text-white"
                v-text="card.title"
              ></v-card-title>
            </v-img>

            <v-card-actions>
              <v-spacer></v-spacer>

              <v-btn
                color="medium-emphasis"
                icon="mdi-heart"
                size="small"
              ></v-btn>

              <v-btn
                color="medium-emphasis"
                icon="mdi-bookmark"
                size="small"
              ></v-btn>

              <v-btn
                color="medium-emphasis"
                icon="mdi-share-variant"
                size="small"
              ></v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-card>



</template>

<style>
.div{

    z-index: -1;

}
</style>
<script>
  export default {
    data: () => ({
      cards: [
        {
          title: 'MEXICO',
          src: 'https://cdn.vuetifyjs.com/images/cards/house.jpg',
          flex: 12,
        },
        {
          title: 'Favorite road trips',
          src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg',
          flex: 6,
        },
        {
          title: 'Best airlines',
          src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg',
          flex: 6,
        },
      ],
    }),
  }
</script>
