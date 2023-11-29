import { StyleSheet, Text, View, TextInput, Button, ImageBackground,Alert  } from 'react-native';
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useNavigation } from '@react-navigation/native';
import Menu from './Menu';
import AsyncStorage from '@react-native-async-storage/async-storage';


// import SelectDropdown from 'react-native-select-dropdown'
// import Carousel from 'react-native-snap-carousel';
import { SelectList } from 'react-native-dropdown-select-list'

const image = { uri: 'https://i.pinimg.com/564x/86/92/22/869222126d19f9969f05f67e803fa404.jpg' };

export default function Orden() {
    const [tipo, setTipo] = useState();
    const [table, setTable] = useState('');
    const [direccion, setDirec] = useState('');
    const [plate_id, setPlate_id] = useState('');
    const [drink_id, setDrink_id] = useState('');
    const navigation = useNavigation();


    const [plates, setPlates] = useState([]);
    const [drinks, setDrinks] = useState([]);

    useEffect(() => {
        AsyncStorage.getItem('token', function (error, userToken) {
            if (error) {
                console.error('Error al obtener el token:', error);
            } else if (userToken) {
                axios.get('http://192.168.20.20:8000/api/plates', {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${userToken}`,
                    },
                }).then(response => {
                    let newArray = response.data.plates.map((item) => {
                        return { key: `${item.id}-$${item.price}`, value: `${item.name} - $${item.price}` };
                    })
                    setPlates(newArray);
                })
                    .catch(error => {
                        console.error(error);
                    })
                axios.get('http://192.168.20.20:8000/api/drinks', {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${userToken}`,
                    },
                }).then(response => {
                    let newArray2 = response.data.drinks.map((item) => {
                        return { key: `${item.id}-$${item.price}`, value: `${item.name} - $${item.price}` };
                    })
                    setDrinks(newArray2);
                })
                    .catch(error => {
                        console.error(error);
                    })
            }
        })
        AsyncStorage.getItem('tipo', function (error, userTipo) {
            if (error) {
                console.error('Error al obtener el tipo:', error);
            } else if (userTipo) {
                setTipo(userTipo);
            }
        })
    }, []);

    const handleOrden = async () => {
        try {
            const [tokenPair, idPair] = await AsyncStorage.multiGet(['token', 'id']);
            const userToken = tokenPair[1];
            const id = idPair[1];

            if (userToken && id) {
                const config = {
                    headers: { Authorization: `Bearer ${userToken}` }
                };
                const separatedDrinks = drink_id.split("-");

                const drink_id2 = separatedDrinks[0]; // Valor a la izquierda del "-"
                const precioDrink = parseFloat(separatedDrinks[1].replace('$', '')); // Valor a la derecha del "-"

                const separatedPlates = plate_id.split("-");

                const plate_id2 = separatedPlates[0]; // Valor a la izquierda del "-"
                const precioPlate =parseFloat(separatedPlates[1].replace('$', '')); // Valor a la derecha del "-"

                const total = precioDrink + precioPlate;

                const mensaje = `Mesa: ${table}\nDirección: ${direccion}\nPlate: ${plate_id}\nDrink: ${drink_id}\nTotal: ${total}`;
                Alert.alert(
                    'Confirmación Pedido',
                    mensaje,
                    [
                      {
                        text: 'Cancelar',
                        style: 'cancel',
                      },
                      {
                        text: 'Aceptar',
                        onPress: () => {
                          let bodyParameters = {
                            table: table,
                            direccion: direccion,
                            plate_id: plate_id2,
                            drink_id: drink_id2,
                            user_id: id,
                            total: total
                        };
        
                        axios.post(
                            'http://192.168.20.20:8000/api/orders',
                            bodyParameters,
                            config
                        ).then((response) => {
                            setPlate_id('');
                            setDrink_id('');
                            setDirec('');
                            setTable('');
                            navigation.navigate('VerOrden');
                        })
                            .catch((error) => {
                                console.error("Eroor", error);
                                setDirec('');
                                setTable('');
                                setPlate_id('');
                                setDrink_id('');
                                navigation.navigate('Orden');
                            });
                          console.log('Pedido realizado');
                        },
                      },
                    ],
                    { cancelable: false }
                  );
            }
        } catch (error) {
            console.error('Error al realizar la orden:', error);
        }
    };
    if (tipo == 2) {
        return (
            <View style={styles.container}>
                <ImageBackground source={image} resizeMode="cover" style={styles.image}>
                    <Text style={{ fontSize: 30, marginBottom: 40, color: 'white' }}>Nueva orden</Text>
                    {/* <Text style={{ fontSize: 30, marginBottom: 40, color: 'white' }}>{plates}</Text> */}
                    <TextInput style={styles.inputs} placeholder='Direccion' onChangeText={(text) => setDirec(text)} value={direccion} ></TextInput>
                    <SelectList
                        setSelected={setPlate_id}
                        data={plates}
                        boxStyles={{ backgroundColor: '#F7E9AB', margin: 10 }}
                        dropdownStyles={{ backgroundColor: '#F7E9AB' }}
                        placeholder='Seleccionar platillo'
                    />
                    <SelectList
                        setSelected={setDrink_id}
                        data={drinks}
                        boxStyles={{ backgroundColor: '#F7E9AB', margin: 10 }}
                        dropdownStyles={{ backgroundColor: '#F7E9AB' }}
                        placeholder='Seleccionar bebida'
                    />

                    <Button title="Ordenar" onPress={handleOrden} color="#FF1700" />
                    <Menu navigation={navigation} />
                </ImageBackground>
            </View>
        );
    }
    else {
        return (
            <View style={styles.container}>
                <ImageBackground source={image} resizeMode="cover" style={styles.image}>
                    <Text style={{ fontSize: 30, marginBottom: 40, color: 'white' }}>Nueva orden</Text>
                    {/* <Text style={{ fontSize: 30, marginBottom: 40, color: 'white' }}>{plates}</Text> */}
                    <TextInput style={styles.inputs} placeholder='Mesa' keyboardType="numeric" onChangeText={(text) => setTable(text)} value={table} ></TextInput>
                    <SelectList
                        setSelected={setPlate_id}
                        data={plates}
                        boxStyles={{ backgroundColor: '#F7E9AB', margin: 10 }}
                        dropdownStyles={{ backgroundColor: '#F7E9AB' }}
                        placeholder='Seleccionar platillo'
                    />
                    <SelectList
                        setSelected={setDrink_id}
                        data={drinks}
                        boxStyles={{ backgroundColor: '#F7E9AB', margin: 10 }}
                        dropdownStyles={{ backgroundColor: '#F7E9AB' }}
                        placeholder='Seleccionar bebida'
                    />
                    <Button title="Ordenar" onPress={handleOrden} color="#FF1700" />
                    <Menu navigation={navigation} />
                </ImageBackground>
            </View>
        );
    }
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
    },
    image: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
    },
    inputs: {
        backgroundColor: '#F7E9AB',
        textAlign: 'center',
        borderWidth: 1,
        borderColor: '#000',
        width: 200,
        height: 40,
        padding: 10,
        margin: 10,
        borderRadius: 10,
    }
});