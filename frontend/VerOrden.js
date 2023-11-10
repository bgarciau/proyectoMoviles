import { StyleSheet, Text, View, ImageBackground } from 'react-native';
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import AsyncStorage from '@react-native-async-storage/async-storage';
import Carousel from 'react-native-snap-carousel';
import Menu from './Menu';
import OrdenCard from './OrdenCard';

const image = { uri: 'https://i.pinimg.com/564x/86/92/22/869222126d19f9969f05f67e803fa404.jpg' };

const VerOrden = ({ navigation }) => {
    const [data, setData] = useState([]);

    useEffect(() => {
        AsyncStorage.getItem('token', function(error, userToken) {
            if (error) {
              console.error('Error al obtener el token:', error);
            } else if (userToken) {
        axios.get('http://192.168.20.20:8000/api/orders',{
            method: 'GET',
            headers: {
              'Authorization': `Bearer ${userToken}`,
            },
          }).then(response => {
            setData(response.data.orders);
          })
          .catch(error => {
            console.error(error);
          })
            }})
    },[]);

    return (
        <View style={styles.container}>
            <ImageBackground source={image} resizeMode="cover" style={styles.image}>
            <Text>MIS ORDENES</Text>
            <Carousel
                containerCustomStyle={{overflow: 'visible'}}
                data={data}
                renderItem={({ item }) => <OrdenCard item={item}/>}
                firstItem={1}
                inactiveSlideOpacity={0.75}
                inactiveSlideScale={0.77}
                sliderWidth={400}
                itemWidth={260}
                slideStyle={{display: 'flex',alignItems: 'center'}}
            />
            <Menu navigation={navigation} />
            </ImageBackground>
        </View>
    );
};

export default VerOrden;

const styles = StyleSheet.create({
    container: {
        flex: 1,
        // justifyContent: 'center',
        // alignItems: 'center',
        // backgroundColor: "#D3B87D"
    },
    image: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
    },
});