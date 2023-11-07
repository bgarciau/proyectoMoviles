import { StyleSheet, Text, View, TextInput, Button, Alert, ImageBackground } from 'react-native';
import React, { useState } from 'react';
import axios from 'axios';
import { useNavigation } from '@react-navigation/native';
import Menu from './Menu';
import AsyncStorage from '@react-native-async-storage/async-storage';
// import { SelectList } from 'react-native-dropdown-select-list'

const image = { uri: 'https://i.pinimg.com/564x/86/92/22/869222126d19f9969f05f67e803fa404.jpg' };

export default function Orden() {
    const [waiter_id, setWaiter_id] = useState('');
    const [client_id, setClient_id] = useState('');
    const [table, setTable] = useState('');
    const [plate_id, setPlate_id] = useState('');
    const [drink_id, setDrink_id] = useState('');
    const [total, setTotal] = useState('');
    const navigation = useNavigation();

    //     const [selected, setSelected] = React.useState("");

    //   const data = [
    //       {key:'1', value:'pizza peperoni', disabled:true},
    //       {key:'2', value:'pizza hawaina'},
    //       {key:'3', value:'pizza pollo champinon'},
    //   ]

    const handleOrden = () => {
        AsyncStorage.getItem('token', function (error, userToken) {
            if (error) {
                console.error('Error al obtener el token:', error);
            } else if (userToken) {
                const config = {
                    headers: { Authorization: `Bearer ${userToken}` }
                };
                
                const bodyParameters = {
                    table: table,
                    plate_id: plate_id,
                    drink_id: drink_id
                };
                
                axios.post( 
                  'http://192.168.20.20:8000/api/orders',
                  bodyParameters,
                  config
                ).then((response) => {
                    navigation.navigate('VerOrden');
                    setWaiter_id();
                    setClient_id();
                    setTable();
                    setPlate_id();
                    setDrink_id();
                    setTotal();
                })
                    .catch((error) => {
                        navigation.navigate('Orden');
                        setWaiter_id();
                        setClient_id();
                        setTable();
                        setPlate_id();
                        setDrink_id();
                        setTotal();
                    });
                } else {
                    console.error('Error al realizar orden. Token no encontrado.');
                  }
                });
            };
            return (
                <View style={styles.container}>
                    <ImageBackground source={image} resizeMode="cover" style={styles.image}>
                        <Text style={{ fontSize: 30, marginBottom: 40, color: 'white' }}>Nueva orden</Text>
                        <TextInput style={styles.inputs} placeholder='Mesa' keyboardType="numeric" onChangeText={(text) => setTable(text)} value={table} ></TextInput>
                        <TextInput style={styles.inputs} placeholder='Platillo' onChangeText={(text) => setPlate_id(text)} value={plate_id}></TextInput>
                        {/* <SelectList 
        setSelected={(val) => setSelected(val)} 
        data={data} 
        save="value"
    /> */}
                        <TextInput style={styles.inputs} placeholder='Bebida' onChangeText={(text) => setDrink_id(text)} value={drink_id}></TextInput>
                        <Button title="Ordenar" onPress={handleOrden} color="#FF1700" />
                        <Menu navigation={navigation} />
                    </ImageBackground>
                </View>
            );
        }

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