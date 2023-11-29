import { StyleSheet, Text, View, ImageBackground } from 'react-native';
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import AsyncStorage from '@react-native-async-storage/async-storage';
import Menu from './Menu';
import { ScrollView } from 'react-native';


const image = { uri: 'https://i.pinimg.com/564x/fe/2b/ef/fe2bef705bc8fcc5cc46a17784cf2bde.jpg' };

const VerOrden = ({ navigation }) => {
  const [data, setData] = useState([]);
  const [tipo, setTipo] = useState();

  useEffect(() => {
    const fetchData = async () => {
      try {
        const [tokenPair, idPair] = await AsyncStorage.multiGet(['token', 'id']);
        const userToken = tokenPair[1];
        const id = idPair[1];

        if (userToken && id) {
          const response = await axios.get(`http://192.168.20.20:8000/api/orders/${id}`, {
            method: 'GET',
            headers: {
              'Authorization': `Bearer ${userToken}`,
            },
          });
          setData(response.data.orders);
        }
      } catch (error) {
        console.error('Error al obtener los datos:', error);
      }
    };

    fetchData();

    AsyncStorage.getItem('tipo', function (error, userTipo) {
      if (error) {
        console.error('Error al obtener el tipo:', error);
      } else if (userTipo) {
        setTipo(userTipo);
      }
    })
  }, []);
  if (tipo == 2) {
    return (
      <ScrollView style={styles.scroll}>
        <ImageBackground source={image} resizeMode="repeat" style={styles.image}>
          <View style={styles.container}>
            <Text style={styles.titulo}>MIS ORDENES</Text>
            {/* CARD1 */}
            {data.map((item) => (
              <View style={styles.marco}>
                <Text style={styles.texto}>Orden de compra:{item.id}</Text>
                <Text style={styles.texto}>Estado:{item.state}</Text>
                <Text style={styles.texto}>Cliente:{item.user_id}</Text>
                <Text style={styles.texto}>Direccion:{item.direccion}</Text>
                <Text style={styles.texto}>Plato:{item.plate_id}</Text>
                <Text style={styles.texto}>Bebida:{item.drink_id}</Text>
                <Text style={styles.texto}>Total:{item.total}</Text>
              </View>
            ))}
          </View>
          <Menu navigation={navigation} />
        </ImageBackground>
      </ScrollView>
    );
  } else {
    return (
      <ScrollView style={styles.scroll}>
        <ImageBackground source={image} resizeMode="repeat" style={styles.image}>
          <View style={styles.container}>
            <Text>MIS ORDENES</Text>
            {/* CARD1 */}
            {data.map((item) => (
              <View style={styles.marco}>
                <Text style={styles.texto}>Orden de compra:{item.id}</Text>
                <Text style={styles.texto}>Estado:{item.state}</Text>
                <Text style={styles.texto}>Meseroo:{item.user_id}</Text>
                <Text style={styles.texto}>Mesa:{item.table}</Text>
                <Text style={styles.texto}>Plato:{item.plate_id}</Text>
                <Text style={styles.texto}>Bebida:{item.drink_id}</Text>
                <Text style={styles.texto}>Total:{item.total}</Text>
              </View>
            ))}
          </View>
          <Menu navigation={navigation} />
        </ImageBackground>
      </ScrollView>
    );
  }
};

export default VerOrden;

const styles = StyleSheet.create({
  container: {
    flex: 1,
    marginTop:100
  },
  scroll: {
    flex: 1,
    resizeMode:"cover"
  },
  image: {
    flex: 1,
  },
  texto: {
    color: 'white',
    fontSize: 20,
    textAlign: 'left',
    marginTop: 20,
    marginLeft: 20,
  },
  titulo: {
    color: 'white',
    fontSize: 20,
    textAlign: 'center',
  },
  marco: {
    borderRadius: 20,
    backgroundColor: '#DC7633',
    marginTop: 10,
    height: 380,
    width: '70%',
    alignSelf: 'center',
  }
});