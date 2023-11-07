import { StyleSheet, Text, View, TextInput, Button, Alert, ImageBackground, Pressable } from 'react-native';
import React, { useState } from 'react';
import axios from 'axios';
import { useNavigation } from '@react-navigation/native';
import AsyncStorage from '@react-native-async-storage/async-storage';

const image = { uri: 'https://i.pinimg.com/564x/cf/e4/9e/cfe49e5d75dfdd785be366c29c338a85.jpg' };




export default function Login() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const navigation = useNavigation();
    const handleRegistro = () => {
        navigation.navigate('Registro');
    };
    const handleLogin = () => {
        axios.post('http://192.168.20.20:8000/api/login', {
            email: email,
            password: password,
        })
            .then((response) => {
                Alert.alert('Bienvenido', 'Inicio de sesión correcto.');
                const token = response.data.token;
                AsyncStorage.setItem('token', token);
                navigation.navigate('Home');
                setEmail('');
                setPassword('');
            })
            .catch((error) => {
                if (error.response && error.response.status === 401) {
                    alert('Contraseña incorrecta. Inténtalo de nuevo.');
                    navigation.navigate('Login');
                } else {
                    Alert.alert('Error', 'Error al iniciar sesión. Inténtalo de nuevo.');
                    navigation.navigate('Login');
                }
            });
    };

    return (
        <View style={styles.container}>
            <ImageBackground source={image} resizeMode="cover" style={styles.image}>
                <Text style={{ fontSize: 30, marginBottom: 40, color: 'white', }}>INICIAR SESIÓN</Text>
                <TextInput

                    style={styles.inputs}
                    placeholder="Correo electrónico"
                    onChangeText={(text) => setEmail(text)}
                    value={email}
                />
                <TextInput
                    style={styles.inputs}
                    placeholder="Contraseña"
                    onChangeText={(text) => setPassword(text)}
                    secureTextEntry={true}
                    value={password}
                />
                {/* <Pressable style={styles.buttons} onPress={handleLogin} color="#FF1700" /> */}
                <Pressable style={styles.buttons} onPress={handleLogin}>
                    <Text style={styles.text}>Enviar</Text>
                </Pressable>
                <Pressable style={styles.buttons} onPress={handleRegistro}>
                    <Text style={styles.text}>Registro</Text>
                </Pressable>
                {/* <Button style={styles.buttons} title="Registro" onPress={handleRegistro} color="#FF1700" /> */}
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
    },
    buttons: {
        alignItems: 'center',
        justifyContent: 'center',
        margin: 5,
        padding: 10,
        borderRadius: 4,
        width: 100,
        backgroundColor: '#FF1700',
    },
    text: {
        fontWeight: 'bold',
        color: 'white',
      },
});